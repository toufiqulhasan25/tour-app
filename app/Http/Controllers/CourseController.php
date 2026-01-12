<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tourist;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * সব কোর্সের লিস্ট এবং স্টুডেন্ট সংখ্যা দেখানোর জন্য।
     */
    public function index()
    {
        // withCount('users') ব্যবহার করলে 'users_count' নামে একটি অটোমেটিক ভেরিয়েবল তৈরি হয়
        $courses = Course::withCount('tourists')->get();
        $tourists = Tourist::with('course')->paginate(10);

        // ভিউ ফাইলে আমরা 'courses' নামে ডাটা পাঠাচ্ছি
        return view('courses.index', compact('courses', 'tourists'));
    }

    public function courseWise($id)
    {
       
        $course = Course::findOrFail($id);

        $students = Tourist::where('course_id', $id)->with('course')->paginate(10);

        return view('courses.courseWise', compact('course', 'students'));
    }

    /**
     * নতুন কোর্স ডাটাবেসে সেভ করার জন্য।
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_code' => 'nullable|string|max:50',
        ]);

        Course::create([
            'name' => $request->name,
            'course_code' => $request->course_code,
        ]);

        return redirect()->back()->with('success', 'Course added successfully!');
    }
}