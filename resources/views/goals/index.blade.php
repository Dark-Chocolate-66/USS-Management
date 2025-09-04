@extends('layouts.app')

@section('page-title','Goals')

{{-- Taskbar specific to Goals --}}
@section('taskbar')
    <!-- Goal List -->
    <a href="{{ route('goals.list') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1">
        <span>Goal List</span>
    </a>

    <!-- My Goals -->
    <a href="{{ route('goals.my') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>My Goals</span>
    </a>

    <!-- Goal Library -->
    <a href="{{ route('goals.library') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Goal Library</span>
    </a>
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <h2 class="h2 mb-2">Goals</h2>
        <p class="p">Set, track, and manage employee and personal goals.</p>
    </div>
@endsection
