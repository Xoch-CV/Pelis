<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $table = 'movies';
    public $guarded = [];
    //public $fillable = [''];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function actors(){
        return $this->belongsToMany(Actor::class)->withTimestamps()
                                                ->withPivot('actor_id','movie_id');
    }
}
