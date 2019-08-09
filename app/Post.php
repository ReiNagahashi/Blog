<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ['title','content','featured_image'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function getFeaturedAttributes(){
        //show.bladeに向けてreturn
        return asset($featured_image);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
