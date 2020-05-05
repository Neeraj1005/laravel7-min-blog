<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','photo_id','title','body','category_id'];


    public function user()
    {
       return $this->belongsTo('App\User')->withTrashed();
    }

    public function photo()
    {
       return $this->belongsTo('App\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
