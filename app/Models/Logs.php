<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'author_id'
    ];
//    public function author(){
//        return $this->hasMany(User::class);
//    }

    public function person(){
        return $this->belongsTo(Persons::class, 'id');

    }
}
