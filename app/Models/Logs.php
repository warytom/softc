<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'author_id',
        'parent_id',
        'path'
    ];
    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function person(){
        return $this->belongsTo(Persons::class, 'person_id');
    }

    public function parent()
    {
        return $this->belongsTo(Logs::class, 'parent_id')->with('person');
    }

    public function children()
    {
        return $this->hasMany(Logs::class, 'parent_id')->with('parent');
    }
}
