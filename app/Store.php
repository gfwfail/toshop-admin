<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name', 'slug','description'];
    public $timestamps = false;
    protected $table = 'stories';

    public static $rules =
        [ 'name' => 'required|max:255',
         'slug'=>'required|unique:stories,id|max:255'];

    public function goods()
    {
        return $this->hasMany(Good::class);
    }
}
