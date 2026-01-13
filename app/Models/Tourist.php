<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    protected $fillable = [
        'name',
        'student_id',
        'course_id',
        'phone_number',
        'blood_group',
        'father_name',
        'mother_name',
        'emergency_contact',
        'batch',
        'user_id',
        'status',
        'district',
        'remarks',           
        'permanent_address',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}