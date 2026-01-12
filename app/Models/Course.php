<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    /**
     * ডাটাবেসের যে কলামগুলোতে ডাটা ইনসার্ট করার অনুমতি আছে।
     */
    protected $fillable = [
        'name',
        'course_code',
    ];

    /**
     * Relationship: একটি কোর্সের অধীনে অনেকজন ইউজার (Student/Teacher) থাকতে পারে।
     * এটি One-to-Many রিলেশনশিপ।
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'course_id');
    }

    public function tourists()
    {
        return $this->hasMany(Tourist::class, 'course_id');
    }
}