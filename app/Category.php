<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug','description'];
    public $timestamps = false;

    public static $rules =
    [ 'name' => 'required|max:255',
        'slug'=>'required|unique:categories,id|max:255'];
    //
    public function stores(){
        return $this->belongsToMany(Store::class);
    }
}
