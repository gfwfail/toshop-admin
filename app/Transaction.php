<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function source()
    {
        return $this->belongsTo('App\User','source_id');
    }

}
