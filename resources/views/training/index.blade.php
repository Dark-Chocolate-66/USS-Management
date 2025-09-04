@extends('layouts.app')

@section('page-title','Training')

{{-- Taskbar specific to Training --}}
@section('taskbar')
    <!-- Courses -->
    <a href="{{ route('training.courses') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1">
        <span>Courses</span>
    </a>

    <!-- Sessions -->
    <a href="{{ route('training.sessions') }}" 
       class="btn btn-primary text-xs flex items-center gap-1 ">
        <span>Sessions</span>
    </a>

    <!-- My Participating Sessions -->
    <a href="{{ route('training.my-participating') }}" 
       class="btn btn-primary text-xs flex items-center gap-1 ">
        <span>My Participating Sessions</span>
    </a>

    <!-- More Dropdown (click) -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
            class="btn btn-primary text-xs flex items-center gap-1 "
            :class="open 
            ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' 
            : 'hover:bg-[var(--color-secondary)] hover:font-bold'">
            <span>More</span>
            <x-heroicon-o-ellipsis-vertical class="w-4 h-4"/>
        </button>
        <div x-show="open" @click.outside="open = false"
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] 
                    z-50 text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">

            <!-- Online Assessment Courses (hover flyout) -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 
                                 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Online Assessment Courses
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block 
                            bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] 
                            text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">
                    <a href="{{ route('training.more.online_assessments.employee') }}" 
   class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
   Employee Assessments
</a>
<a href="{{ route('training.more.online_assessments.my') }}" 
   class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
   My Assessments
</a>
<a href="{{ route('training.more.online_assessments.courses') }}" 
   class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
   Courses and Assessments
</a>
<a href="{{ route('training.more.online_assessments.certificate_template') }}" 
   class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
   Configure Certificate Template
</a>

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <h2 class="h2 mb-2">Training</h2>
        <p class="p">Courses, sessions, assessments, and certifications.</p>
    </div>
@endsection
