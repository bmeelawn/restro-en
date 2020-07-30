<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function restaurant() {
        return $this->belongsTo('App\Restaurant', 'res_id', 'id');
    }
}
