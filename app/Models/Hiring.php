<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacherId',
        'stuName',
        'currentSchool',
        'gender',
        'parentName',
        'customerPhone',
        'customerAddress',
        'moneyPhoto',
        'fee',
        'teacherName',
        'tr_position',
        'subject'
    ];
}
