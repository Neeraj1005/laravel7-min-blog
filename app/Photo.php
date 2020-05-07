<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ['file'];

    protected $filepath = '/storage/media/';

    public function getFileAttribute($value)
    {

        return asset($value ? $this->filepath.$value: '/images/default-avatar.jpeg');

    }

    public function posts()
    {

        $this->hasMany('App\Post');
    }

    public function users()
    {

        $this->hasMany('App\User');
    }
}
