@extends('errors::minimal')
@section('title', __('Permission Denied'))
@section('code', '403')

@section('message')
    <div class="text-center">
        <h3 class="text-danger fw-bold">এক্সেস ডিনাইড!</h3>
        <p class="text-muted">আপনার এই প্রোফাইলটি দেখার অনুমতি নেই।</p>
        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm shadow-sm">
            ড্যাশবোর্ডে ফিরে যান
        </a>
    </div>
@endsection