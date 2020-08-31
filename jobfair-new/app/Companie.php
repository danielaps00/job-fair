<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    protected $table = "companies"; 
    protected $fillable = ['name', 'image'];
    protected $casts = [
        'active' => 'boolean'
    ];
}
