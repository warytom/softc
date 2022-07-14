<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'other_id',
        'tax_identity_sign',
        'entry_date',
        'exit_date'
        ];

    public function log(){
        return $this->hasOne(Logs::class, 'person_id')->with('author');
    }

}
