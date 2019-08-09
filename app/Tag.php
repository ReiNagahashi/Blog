<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    protected function posts(){
        return $this->belongsToMany('App\Post');
    }
}
