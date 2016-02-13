<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class Deal extends Model
{
    use Metable;

    protected $fillable = ['name', 'description','store_id','code','expired_at'];

    public static $rules =
        [ 'name' => 'required|max:255',
            'store_id'=>'required',
            'categories_id'=>'required',
            'expired_at'=>'date'
        ];





    public function scopeAvailable($query){
        $currentDate = date('Y-m-d');
        return $query->whereDate('expired_at', '>', $currentDate);
    }

    public function photos(){
        return $this->belongsToMany(Photo::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
