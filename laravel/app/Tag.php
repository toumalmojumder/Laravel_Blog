<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
class Tag extends Model
{
    protected $fillable = ['tag'];
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
