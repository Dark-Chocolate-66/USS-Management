@extends('layouts.app')

@section('page-title','Leave Management')

@section('taskbar')
    <!-- Leave List -->
    <a href="{{ route('leave.list') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1">
        <span>Leave List</span>
    </a>

    <!-- Assign Leave -->
    <a href="{{ route('leave.assign') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Assign Leave</span>
    </a>

    <!-- Bulk Assign -->
    <a href="{{ route('leave.bulk') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Bulk Assign</span>
    </a>

    <!-- Apply -->
    <a href="{{ route('leave.apply') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Apply</span>
    </a>

    <!-- My Leave Usage -->
    <a href="{{ route('leave.usage') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>My Leave Usage</span>
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
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] z-50 
                    text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">

            <!-- Leave Calendar -->
            <a href="{{ route('leave.calendar') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Leave Calendar</a>

            <!-- My Leave -->
            <a href="{{ route('leave.my_leave') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">My Leave</a>

            <!-- Entitlements (flyout left) -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Entitlements
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block 
                            bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] 
                            text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">
                    <a href="{{ route('leave.entitlements.add') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Add Entitlements</a>
                    <a href="{{ route('leave.entitlements.list') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Entitlement List</a>
                    <a href="{{ route('leave.entitlements.my') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">My Entitlements</a>
                </div>
            </div>

            <!-- Configure (flyout left) -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Configure
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block 
                            bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] 
                            text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">
                    <a href="{{ route('leave.configure.period') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Leave Period</a>
                    <a href="{{ route('leave.configure.types') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Leave Types</a>
                    <a href="{{ route('leave.configure.holidays') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Holidays</a>
                    <a href="{{ route('leave.configure.weekends') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Working Weekends</a>
                    <a href="{{ route('leave.configure.bradford') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Bradford Factor Threshold</a>
                    <a href="{{ route('leave.configure.notifications') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Notifications</a>
                    <a href="{{ route('leave.configure.calendar') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Leave Calendar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <h2 class="h2 mb-2">Leave Management</h2>
        <p class="p">Apply, assign, track, and configure leave.</p>
    </div>
@endsection
