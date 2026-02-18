<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery; // মডেলটি ইমপোর্ট করতে ভুলবেন না

class GalleryController extends Controller
{
    // ১. আপলোড ফর্ম দেখানোর জন্য মেথড
    public function create()
    {
        return view('gallery.create'); // নিশ্চিত করুন resources/views/gallery/create.blade.php ফাইলটি আছে
    }

    // ২. ছবি সেভ করার জন্য মেথড
    public function store(Request $request)
    {
        // ভ্যালিডেশন
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        // ছবি আপলোড লজিক
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/gallery'), $imageName);

            // ডাটাবেসে সেভ করা
            Gallery::create([
                'image' => $imageName,
                'title' => $request->title,
            ]);

            return back()->with('success', 'ছবিটি সফলভাবে আপলোড হয়েছে!');
        }

        return back()->with('error', 'কোনো সমস্যা হয়েছে, আবার চেষ্টা করুন।');
    }

    // ৩. গ্যালারি পেজে সব ছবি দেখানোর মেথড
    public function index(Request $request)
    {
        $images = Gallery::latest()->paginate(6); // প্রতিবার ৬টি করে ছবি

        if ($request->ajax()) {
            $view = view('landing.gallery_data', compact('images'))->render();
            return response()->json(['html' => $view, 'nextPage' => $images->nextPageUrl()]);
        }

        return view('landing.gallery', compact('images'));
    }
}