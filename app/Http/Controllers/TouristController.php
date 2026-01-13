<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tourist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TouristController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        if(Auth::user()->role_id == 2){
            $courses = Course::all(); 
            return view('user.registrationTour', compact('user', 'courses'));
        }

    }
    public function tour_list()
{
    if (Auth::user()->role_id == 2) {
        $tourists = Tourist::where('user_id', Auth::user()->id)->paginate(10);
        return view('user.user', compact('tourists'));
    }

    abort(403);
}
    public function store(Request $request)
    {
        Tourist::create([
            'name' => $request->name,
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'phone_number' => $request->phone_number,
            'blood_group' => $request->blood_group,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'emergency_contact' => $request->emergency_contact,
            'batch' => $request->batch,
            'user_id' => auth()->id(),
            'status' => $request->status,
            'district' => $request->district,
            'permanent_address' => $request->permanent_address,
        ]);
        return back()->with('message', 'Registration successfull');
    }

    public function showProfile($id)
{
    // স্টুডেন্টের তথ্য এবং কোর্স রিলেশনসহ নিয়ে আসা
    $student = Tourist::with('course')->findOrFail($id);
    
    return view('admin.student', compact('student'));
}
}
