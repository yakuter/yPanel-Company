<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Headline extends Model
{
    use SoftDeletes;
    
    protected $table = 'headlines';
    protected $fillable = [
        'name',
        'link',
        'info',
        'image'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}