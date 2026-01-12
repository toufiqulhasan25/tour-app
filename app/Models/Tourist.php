<?php

namespace App\Models;

use Illuminate\Cache\HasCacheLock;
use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    use HasCacheLock;
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
        'permanent_address',
    ];
}
