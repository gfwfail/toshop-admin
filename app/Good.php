<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Good
 * @package App
 */
class Good extends Model
{
    protected $fillable = ['name', 'description','store_id','restrict','expired_at'];

    public static $rules =
        [ 'name' => 'required|max:255',
            'store_id'=>'required',
            'categories_id'=>'required',
            'expired_at'=>'date'
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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
