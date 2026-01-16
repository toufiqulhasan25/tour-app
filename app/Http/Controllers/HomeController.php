<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tourist;
use App\Models\User;
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
    public function index(Request $request) 
{
    $totalStudents = Tourist::count();
    $status = $request->get('status'); 
    $search = $request->get('search');

    if(Auth::user()->role_id == 1){ 
        $courses = Course::withCount('tourists')->get();
        
        $query = Tourist::with('course');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('student_id', 'LIKE', "%{$search}%")
                  ->orWhere('phone_number', 'LIKE', "%{$search}%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        $activeStudents = Tourist::where('status', 'active')->count();
        $pendingStudents = Tourist::where('status', 'pending')->count();
        $rejectedStudents = Tourist::where('status', 'rejected')->count();

        $tourists = $query->latest()->paginate(10);

        return view('admin.admin', compact(
            'courses', 
            'tourists', 
            'totalStudents', 
            'activeStudents', 
            'pendingStudents', 
            'rejectedStudents'
        ));

    } else { 
        $query = Tourist::where('user_id', Auth::user()->id);

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        if ($status) {
            $query->where('status', $status);
        }

        $tourists = $query->latest()->paginate(10);
        
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
    $user = auth()->user();

    if ($user->role_id != 1 && $student->user_id !== $user->id) {
        abort(403, 'You are not authorized to view this profile.');
    }

    if ($user->role_id == 1) {
        return view('admin.student', compact('student'));
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

    public function myAdminProfile()
    {
        $user = User::with('course')->findOrFail(auth()->id());
        
        return view('admin.profile_page', compact('user'));
    }
    public function myUserProfile()
    {
        $user = User::with('course')->findOrFail(auth()->id());
        
        return view('user.profile_page', compact('user'));
    }

    public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:15',
        'blood_group' => 'nullable|string|max:5',
    ]);

    $user->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'blood_group' => $request->blood_group,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}

public function deleteStudent($id)
{
    $student = Tourist::findOrFail($id);

    if (!auth()->user()->isAdmin() && $student->user_id !== auth()->id()) {
        abort(403, 'You are not authorized to delete this record.');
    }

    $student->delete();

    return redirect()->back()->with('success', 'Registration deleted successfully!');
}

  
}