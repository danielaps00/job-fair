<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancie extends Model
{
    protected $table = 'vacancies';
    protected $fillable = ['idcompanies', 'type', 'title', 'desc', 'image'];
    protected $casts = [
         'active' => 'boolean'
    ];
}
