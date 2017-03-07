<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    
    protected $table = 'pages';
    protected $fillable = [
        'name',
        'slug',
        'info',
        'keywords',
        'description',
        'image'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
