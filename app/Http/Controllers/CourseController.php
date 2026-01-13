<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tourist;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   
    public function index()
    {
        $courses = Course::withCount('tourists')->get();
        $tourists = Tourist::with('course')->paginate(10);

        return view('courses.index', compact('courses', 'tourists'));
    }

    public function courseWise($id)
    {
        $course = Course::findOrFail($id);
        $students = Tourist::where('course_id', $id)->with('course')->paginate(10);

        return view('courses.courseWise', compact('course', 'students', 'id'));
    }

    
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