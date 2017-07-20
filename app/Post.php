<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    public $timestamps = false;

    public function author(){
    	return $this->belongsTo('App\Author','author_id');
    }
}
