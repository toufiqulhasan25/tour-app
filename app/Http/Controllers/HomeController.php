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
        $totalStudents = Tourist::count();

        if(Auth::user()->role_id == 1){
            $courses = Course::withCount('tourists')->get();
            $tourists = Tourist::with('course')->paginate(10);

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
            'status'  => 'required|in:active,pending,rejected', 
            'remarks' => 'nullable|string|max:500',
        ]);

        $student = Tourist::findOrFail($id);

        
        $student->status = $request->status;
        $student->remarks = $request->remarks;

        $student->save();

        return redirect()->back()->with('success', 'Student status updated successfully!');
    }



    public function downloadPDF($id)
    {
        $student = Tourist::with('course')->findOrFail($id);
        
        $pdf = Pdf::loadView('user.profile_pdf', compact('student'));
        
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

    public function generateAllStudentsReport()
    {
        $students = Tourist::with('course')->latest()->get();
        
        $stats = [
            'total' => $students->count(),
            'active' => $students->where('status', 'active')->count(),
            'pending' => $students->where('status', 'pending')->count(),
        ];

        $pdf = Pdf::loadView('admin.all_students_pdf', compact('students', 'stats'));
        
        $pdf->setPaper('a4', 'landscape');
    
        return $pdf->download('All_Students_Report_'.date('d_M_Y').'.pdf');
    }

    public function generateStudentPDF($id)
    {
        $student = Tourist::with('course')->findOrFail($id);
    
        $pdf = Pdf::loadView('user.profile_pdf', compact('student'));
    
        return $pdf->download('Student_Profile_'.$student->id.'.pdf');
    }

  
}