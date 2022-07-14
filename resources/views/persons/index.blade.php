@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-3">
                    <h4 class="mt-5">Feltöltött személyek:</h4>
                    <div class="card table-card">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Név</th>
                                <th scope="col">Adóazonosító Jel</th>
                                <th scope="col">Egyébid</th>
                                <th scope="col">Belépés</th>
                                <th scope="col">Kilépés</th>
                                <th scope="col">Feltöltő</th>
                                <th scope="col">Feltöltés ideje</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($persons as $person)
                                <tr>
                                    <th scope="row">{{$person->id}}</th>
                                    <td>{{$person->name}}</td>
                                    <td>{{$person->tax_identity_sign}}</td>
                                    <td>{{$person->other_id}}</td>
                                    <td>{{$person->entry_date}}</td>
                                    <td>{{$person->exit_date}}</td>
                                    <td>{{($person->log->author->name)}}</td>
                                    <td>{{($person->log->created_at->format('Y-m-d'))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection