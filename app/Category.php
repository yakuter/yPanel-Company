<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $table = 'categories';
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'info',
        'image'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    public function products(){
        return $this->hasMany('App\Product');
    }
    
    public function parent_cat()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function child_cat()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }
    
}