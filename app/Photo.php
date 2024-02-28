<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'album_id','title',
    ];
    //
    public function album() {
        return $this->belongsTo('App\Album');
    }
}