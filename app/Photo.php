<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;
    
    protected $table = 'photos';
    protected $fillable = [
        'image',
        'product_id',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
