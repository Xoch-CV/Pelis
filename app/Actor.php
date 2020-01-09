<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public $table = 'actors';
    public $guarded = [];

    /*public function movie(){
        return $this->hasMany(Movie::class);
    }*/

    public function movies(){
        return $this->belongsToMany(Movie::class)->withTimestamps()
                                                ->withPivot('actor_id','movie_id');
    }

}
