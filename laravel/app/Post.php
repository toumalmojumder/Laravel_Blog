<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
use SoftDeletes;
protected $fillable = [
'title', 'content','featured','category_id','slug'
];
protected $dates = ['deleted_at'];
    public function category(){
        return $this ->hasMany('App\Categoryt');
    }
}
