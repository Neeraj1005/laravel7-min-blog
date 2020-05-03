<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ['file'];

    protected $uploads = '/images/';

    public function getFileAttribute($value)
    {
        // return asset( $this->uploads . $value ? : '/default-avatar.jpeg');
        return asset($this->uploads . $value);
    }
}
