<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\VacancyController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;
    protected $fillable = [
        'courseName' ,
        'subjectName' ,
        'salary',
        'description',
        'count'
    ];
}
