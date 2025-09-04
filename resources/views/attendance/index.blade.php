@extends('layouts.app')

@section('page-title','Attendance Management')

{{-- Taskbar specific to Attendance --}}
@section('taskbar')
    <!-- Attendance Sheets -->
    <a href="{{ route('attendance.sheets') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1">
        <span>Attendance Sheets</span>
    </a>

    <!-- Approve Attendance Sheets -->
    <a href="{{ route('attendance.approve') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Approve Attendance Sheets</span>
    </a>

    <!-- Employee Records -->
    <a href="{{ route('attendance.records') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Employee Records</span>
    </a>

    <!-- Punch In/Out -->
    <a href="{{ route('attendance.punch') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Punch In/Out</span>
    </a>

    <!-- More Dropdown (click) -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
            class="btn btn-primary text-xs flex items-center gap-1"
            :class="open 
            ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' 
            : 'hover:bg-[var(--color-secondary)] hover:font-bold'">
            <span>More</span>
            <x-heroicon-o-ellipsis-vertical class="w-4 h-4"/>
        </button>

        <div x-show="open" @click.outside="open = false"
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md 
                    min-w-[220px] z-50 text-xs text-[var(--color-secondtext)] 
                    hover:text-[var(--color-primarytext)] p-2">

            <!-- My Attendance Sheet -->
            <a href="{{ route('attendance.my_sheet') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
               My Attendance Sheet
            </a>

            <!-- My Monthly Attendance -->
            <a href="{{ route('attendance.my_monthly') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
               My Monthly Attendance
            </a>

            <!-- Pay Policies -->
            <a href="{{ route('attendance.policies') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
               Pay Policies
            </a>

            <!-- Data Upload -->
            <a href="{{ route('attendance.upload') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
               Data Upload
            </a>

            <!-- Configuration -->
            <a href="{{ route('attendance.configuration') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
               Configuration
            </a>
        </div>
    </div>
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <h2 class="h2 mb-2">Attendance Management</h2>
        <p class="p">Punch in/out, manage attendance records, approve sheets, and more.</p>
    </div>
@endsection
