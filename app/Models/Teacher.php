<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'position',
        'subject',
        'salary',
        'photo',
        'name',
        'email',
        'phno',
        'gender',
        'stuIDcard',
        'academicYear' ,
        'major',
        'address',
        'experience',
        'section1',
        'section2',
        'section3',
        'section4',
        'confirm',
        'hiring_status',
        'vacancyNo'
    ];
}
