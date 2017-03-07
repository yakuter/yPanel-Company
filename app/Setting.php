<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    
    protected $table = 'settings';
    protected $fillable = [
        'site_option',
        'slug',
        'value'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
