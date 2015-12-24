<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name','language','area', 'slug','description','link','cashback','istrack'];
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


    public function getLanguageAttribute($value)
    {
        return $value?explode(',',$value):[];
    }

    public function setLanguageAttribute($value)
    {
        $this->attributes['language'] =$value?implode(',',$value):'';
    }


    public function getAreaAttribute($value)
    {
        return $value?explode(',',$value):[];
    }

    public function setAreaAttribute($value)
    {
        $this->attributes['area'] = $value?implode(',',$value):'';
    }

    public function getSidLinkAttribute()
    {
        $value = $this->link;
        $sid = auth()->user()?(auth()->user()->id.'W'.$this->id):'TOSHOP'.$this->id;
        return sid_url($value,$sid);
    }}
