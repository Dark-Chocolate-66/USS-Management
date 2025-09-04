@extends('layouts.app')

@section('page-title','Time Tracking')

{{-- Taskbar specific to Time Tracking --}}
@section('taskbar')

    <!-- Employee Timesheets -->
    <a href="{{ route('time.timesheets') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1 
              {{ request()->routeIs('time.timesheets') ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' : '' }}">
        <span>Employee Timesheets</span>
    </a>

    <!-- More Dropdown -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
            class="btn btn-primary text-xs flex items-center gap-1"
            :class="open 
            ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' 
            : 'hover:bg-[var(--color-secondary)] hover:font-bold'">
            <span>More</span>
            <x-heroicon-o-ellipsis-vertical class="w-4 h-4 ml-1"/>
        </button>

        <!-- More Menu -->
        <div x-show="open" @click.outside="open = false"
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[250px] z-50 text-xs 
                    text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">

            <!-- My Timesheets -->
            <a href="{{ route('time.my') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">My Timesheets</a>

            <!-- Activity Info -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Activity Info
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] text-xs p-2">
                    <a href="{{ route('time.info.customers') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Customers</a>
                    <a href="{{ route('time.info.projects') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Projects</a>
                    <a href="{{ route('time.info.activities') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Common Activities</a>
                </div>
            </div>

            <!-- Configuration -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Configuration
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] text-xs p-2">
                    <a href="{{ route('time.configuration.periods') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Timesheet Periods</a>
                </div>
            </div>

        </div>
    </div>

    {{-- 🔍 Search + Filter --}}
    <div class="ml-auto flex items-center gap-2">
        <!-- Search input -->
        <form action="{{ route('time.search') }}" method="GET" class="relative flex items-center">
            <div class="relative">
                <input type="text" name="q" placeholder="Search Timesheet"
                       class="text-xs px-3 py-1 rounded-none bg-[var(--color-mainbg)] border-l border-b border-gray-300 focus:outline-none"/>
                
                <!-- Magnifying glass -->
                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 hover:text-[var(--color-texthover)]">
                    <x-heroicon-o-magnifying-glass class="w-4 h-4 text-[var(--color-secondtext)] hover:text-[var(--color-texthover)]"/>
                </button>
            </div>
        </form>

        <!-- Filter -->
        <button class="flex items-center justify-center w-10 h-10 hover:text-[var(--color-texthover)] rounded-none">
            <x-heroicon-o-funnel class="w-5 h-5 ml-4"/>
        </button>
    </div>

@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <h2 class="h2 mb-2">Time Tracking</h2>
        <p class="p">Manage employee timesheets, activities, and configurations.</p>
    </div>
@endsection
