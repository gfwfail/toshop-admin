<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'slug','description','link','cashback'];
    public $timestamps = false;
    protected $table = 'stories';

    public static $rules =
        [ 'name' => 'required|max:255',
         'slug'=>'required|unique:stories,slug|max:255',
        'photo'=> 'mimes:jpeg,jpg',
        'categories_id'=>'required',

        ];

    public function goods()
    {
        return $this->hasMany(Good::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}
