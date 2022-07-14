<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use App\Models\Persons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class PersonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $persons = Persons::with('log')->get();
        return view('persons.index')->with('persons', $persons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //load xml
        $xml = simplexml_load_string($request->xml->getContent());
        $json = json_encode($xml);
        $persons = json_decode($json, TRUE);
        $auth = auth()->user()->id;
        $results = [];
        $successes = [];
        //save xml file
        $path = $request->xml->store('storage/xml', 'public');
        //create main log
        $parentLog = new Logs();
        $parentLog->author_id = $auth;
        $parentLog->path = $path;
        $parentLog->save();
        //persons processing
        foreach ($persons['person'] as $person) {
            $newPerson = new Persons();
            $newPerson->name = $person['name'];
            $newPerson->other_id = $person['other_id'];
            $newPerson->tax_identity_sign = $person['tax_identity_sign'];
            $newPerson->entry_date = $person['entry_date'];
            $newPerson->exit_date = $person['exit_date'];

            if (Persons::where('tax_identity_sign', $person['tax_identity_sign'])->count() == 0) {
                $newPerson->save();
                $newLog = new Logs();
                $newLog->parent_id = $parentLog->id;
                $newLog->person_id = $newPerson->id;
                $newLog->author_id = $auth;
                $newLog->save();
                $successes[] = $newPerson;
            }

            $results[] = $newPerson;
        }
        if (count($successes) == 0) {
            $parentLog->delete();
        }
        return view('index')->with('results', $results);
    }
}
