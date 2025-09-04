@extends('layouts.app')

@section('page-title','HR Administration')

{{-- Taskbar specific to HR Administration --}}
@section('taskbar')
    <!-- Users -->
    <a href="{{ route('hr.users') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1">
        <!-- <x-heroicon-o-user class="w-4 h-4"/> -->
        <span>Users</span>
    </a>

    <!-- Manage Roles -->
    <a href="{{ route('hr.roles') }}" 
       class="btn btn-primary text-xs flex items-center gap-1 ">
        <!-- <x-heroicon-o-identification class="w-4 h-4"/> -->
        <span>Manage Roles</span>
    </a>

    <!-- Jobs Dropdown (click) -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
            class="btn btn-primary text-xs flex items-center gap-1 " 
            :class="open 
            ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' 
            : 'hover:bg-[var(--color-secondary)] hover:font-bold'">
            <!-- <x-heroicon-o-briefcase class="w-4 h-4"/> -->
            <span>Jobs</span>
            <x-heroicon-o-chevron-down class="w-4 h-4 ml-1"/>
        </button>
        <div x-show="open" @click.outside="open = false"
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] z-50 text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">
            <a href="{{ route('hr.jobs.salary') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Manage Salary Components</a>
            <a href="{{ route('hr.jobs.titles') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Manage Job Titles</a>
            <a href="{{ route('hr.jobs.paygrades') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Manage Pay Grades</a>
            <a href="{{ route('hr.jobs.statuses') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Manage Employment Statuses</a>
            <a href="{{ route('hr.jobs.categories') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Manage Job Categories</a>
        </div>
    </div>

    <!-- Organization Dropdown (click) -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
            class="btn btn-primary text-xs flex items-center gap-1"
            :class="open 
            ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' 
            : 'hover:bg-[var(--color-secondary)] hover:font-bold'">
            <!-- <x-heroicon-o-building-office class="w-4 h-4"/> -->
            <span>Organization</span>
            <x-heroicon-o-chevron-down class="w-4 h-4 ml-1"/>
        </button>
        <div x-show="open" @click.outside="open = false"
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] z-50 text-xs text-[var(--color-secondtext)]  hover:text-[var(--color-primarytext)] p-2">
            <a href="{{ route('hr.organization.general') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">General Information</a>
            <a href="{{ route('hr.organization.locations') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Locations</a>
            <a href="{{ route('hr.organization.structure') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Structure</a>
            <a href="{{ route('hr.organization.costcenters') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Cost Centers</a>
            <a href="{{ route('hr.organization.eeofilings') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Process EEO Filing</a>
        </div>
    </div>

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
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] z-50 text-xs text-[var(--color-secondtext)]  hover:text-[var(--color-primarytext)] p-2">

            <!-- Announcements (hover flyout to left) -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Announcements
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs text-[var(--color-secondtext)]  hover:text-[var(--color-primarytext)] p-2">
                    <a href="{{ route('hr.more.announcements.news') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">News</a>
                    <a href="{{ route('hr.more.announcements.documents') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Documents</a>
                    <a href="{{ route('hr.more.announcements.documents-category') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Documents Category</a>
                </div>
            </div>

            <!-- Configurations (hover flyout to left) -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold p-2 rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Configuration
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] text-xs text-[var(--color-secondtext)]  hover:text-[var(--color-primarytext)] p-2">
                    <a href="{{ route('hr.more.config.email') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Email Notifications</a>
                    <a href="{{ route('hr.more.config.localization') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Localization</a>
                    <a href="{{ route('hr.more.config.authentication') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Authentication</a>
                    <a href="{{ route('hr.more.config.icalendar') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">iCalendar</a>
                </div>
            </div>

            <!-- Audit Trail -->
            <a href="{{ route('hr.more.audit') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Audit Trail</a>
        </div>
    </div>
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <h2 class="h2 mb-2">HR Administration</h2>
        <p class="p">Leave types, balances, requests, approvals.</p>
    </div>
@endsection
