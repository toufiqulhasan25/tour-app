<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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
            $courses = Course::withCount('tourists')->get();
            $tourists = Tourist::where('user_id', Auth::user()->id)->paginate(10);
            return view('user.user', compact('tourists'));
        }
    }

    public function updateStudent(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,applied,inactive',
            'remarks' => 'nullable|string|max:500',
        ]);

        $student = Tourist::findOrFail($id);

        $student->status = $request->status;
        if($request->has('remarks')){
            $student->remarks = $request->remarks;
        }

        $student->save();

        return redirect()->back()->with('success', 'Student status updated successfully!');
    }



    public function downloadPDF($id)
    {
        $student = Tourist::with('course')->findOrFail($id);
        
        // পিডিএফ এর জন্য আলাদা একটি ভিউ ফাইল লোড করা হচ্ছে
        $pdf = Pdf::loadView('user.profile_pdf', compact('student'));
        
        // ফাইলটি ডাউনলোড করার জন্য নাম সেট করা
        return $pdf->download('Student_Profile_'.$student->id.'.pdf');
    }

    public function showStudentProfile($id)
    {
        $student = Tourist::with('course')->findOrFail($id);

        if ($student->user_id !== auth()->id()) {
            abort(403, 'আপনার এই প্রোফাইল দেখার অনুমতি নেই।'); 
        }

        return view('user.student', compact('student'));
    }

  
}