<?php

namespace App\Http\Controllers;

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
            return view('tourist.create', compact('user'));
        }

    }
    public function tour_list(){
        if(Auth::user()->role_id == 2){
            $tourists = Tourist::where('user_id', Auth::user()->id)->get();
            return view('home.user', compact('tourists'));
        }
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
            'emergency_contact' => $request->course_id,
            'batch' => $request->batch,
            'user_id' => auth()->id(),
            'status' => $request->status,
            'district' => $request->district,
            'permanent_address' => $request->permanent_address,
        ]);
        return back()->with('message', 'Registration successfull');
    }
}
