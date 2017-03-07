<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'info',
        'keywords',
        'description',
        'category_id'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }
    
    public function photos(){
        return $this->hasMany('App\Photo');
    }
}
