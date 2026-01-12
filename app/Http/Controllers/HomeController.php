<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // ডাটাবেস থেকে মোট স্টুডেন্ট সংখ্যা গণনা করা
        $totalStudents = Tourist::count();

        if(Auth::user()->role_id == 1){
            $courses = Course::withCount('tourists')->get();
            $tourists = Tourist::with('course')->paginate(10);

            // ভিউতে totalStudents পাঠানো হচ্ছে
            return view('admin.admin', compact('courses', 'tourists', 'totalStudents'));
        } else {
            $tourists = Tourist::where('user_id', Auth::user()->id)->paginate(10);
            return view('user.user', compact('tourists'));
        }
    }

    public function updateStudent(Request $request, $id)
{
    // ১. ডাটা ভ্যালিডেশন
    $request->validate([
        'status' => 'required|in:active,applied,inactive',
        'remarks' => 'nullable|string|max:500',
    ]);

    // ২. স্টুডেন্ট খুঁজে বের করা
    $student = Tourist::findOrFail($id);

    // ৩. ডাটা আপডেট করা
    $student->status = $request->status;
    // যদি আপনার ডাটাবেসে remarks কলাম থাকে তবে এটি সেভ হবে
    if($request->has('remarks')){
        $student->remarks = $request->remarks;
    }

    $student->save();

    // ৪. সাকসেস মেসেজসহ ফেরত পাঠানো
    return redirect()->back()->with('success', 'Student status updated successfully!');
}
}