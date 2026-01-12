<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Course::insert([
        ['name' => 'Diploma in Web Application Development', 'course_code' => 'WAD01'],
        ['name' => 'Diploma in ICT', 'course_code' => 'ICT02'],
        ['name' => 'Diploma in Tourism & Hospitality', 'course_code' => 'TH03'],
        ['name' => 'Teacher', 'course_code' => 'TCH'],
        ['name' => 'Staff', 'course_code' => 'STF'],
    ]);
}
}
