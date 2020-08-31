<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicants';
    protected $fillable = ['idvacancies', 'name', 'ktp', 'birth_place', 'birth_date', 'email',
                            'phone1', 'phone2', 'address', 'photo'];
    protected $casts = [
        'active' => 'boolean'
    ]; 
}
