<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // ডাটাবেসের কোন কোন কলামে আমরা সরাসরি ডাটা পাঠাতে পারব তা এখানে বলে দিতে হয়
    protected $fillable = [
        'image', 
        'title'
    ];
}