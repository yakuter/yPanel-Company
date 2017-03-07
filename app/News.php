<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    
    protected $table = 'news';
    protected $fillable = [
        'date',
        'name',
        'slug',
        'info',
        'keywords',
        'description'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}