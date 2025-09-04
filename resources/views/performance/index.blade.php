@extends('layouts.app')

@section('page-title','Performance')

{{-- Taskbar specific to Performance --}}
@section('taskbar')
    <!-- Appraisal List -->
    <a href="{{ route('performance.appraisals') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1">
        <span>Appraisal List</span>
    </a>

    <!-- Appraisal Cycles -->
    <a href="{{ route('performance.cycles') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Appraisal Cycles</span>
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
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] z-50 text-xs text-[var(--color-secondtext)]  hover:text-[var(--color-primarytext)] p-2">

            <!-- My Appraisals -->
            <a href="{{ route('performance.more.my-appraisals') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                My Appraisals
            </a>

            <!-- Employee Trackers (hover flyout to left) -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Employee Trackers
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">
                    <a href="{{ route('performance.more.trackers.list') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Tracker List</a>
                    <a href="{{ route('performance.more.trackers.my') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">My Trackers</a>
                    <a href="{{ route('performance.more.trackers.manage') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Manage Trackers</a>
                </div>
            </div>

            <!-- Competency Profiles -->
            <a href="{{ route('performance.more.competency-profiles') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                Competency Profiles
            </a>

            <!-- Configuration (hover flyout to left) -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Configuration
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">
                    <a href="{{ route('performance.more.configuration.appraisal') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Appraisal</a>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <h2 class="h2 mb-2">Performance</h2>
        <p class="p">Manage appraisals, cycles, trackers, and competency profiles.</p>
    </div>
@endsection
