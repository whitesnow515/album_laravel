<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = array('album_id','share_link');
    //
    // public function album() {
    //     return $this->belongsTo('App\Album');
    // }
}
