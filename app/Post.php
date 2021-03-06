<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCurrentUser($query)
    {
        return $query->where('user_id',\Auth::user()->id);
    }

}
