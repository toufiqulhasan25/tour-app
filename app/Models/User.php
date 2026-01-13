<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'name',
    'email',
    'phone',
    'blood_group',
    'role_id',
    'course_id',
    'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getInitialsAttribute()
{
    $name = $this->name; 
    $words = explode(' ', $name); 
    $initials = '';

    foreach ($words as $word) {
        $initials .= strtoupper($word[0]); 
    }

    return substr($initials, 0, 2);
}


public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}

public function isAdmin() {
    return $this->role_id == 1; 
}




}
