@extends('layouts.app')

@section('page-title','On/Offboarding Management')

{{-- Taskbar specific to On/Offboarding --}}
@section('taskbar')
    <!-- Preboarding -->
    <a href="{{ route('boarding.preboarding') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1">
        <span>Preboarding</span>
    </a>

    <!-- Manage Dropdown (click) -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
            class="btn btn-primary text-xs flex items-center gap-1"
            :class="open 
                ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' 
                : 'hover:bg-[var(--color-secondary)] hover:font-bold'">
            <span>Manage</span>
            <x-heroicon-o-chevron-down class="w-4 h-4 ml-1"/>
        </button>

        <!-- Dropdown -->
        <div x-show="open" @click.outside="open = false"
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[240px] z-50 text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">
            
            <a href="{{ route('boarding.manage.events') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                Manage Events / Templates
            </a>
            <a href="{{ route('boarding.manage.tasks') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                View Employee Tasks
            </a>
            <a href="{{ route('boarding.manage.my_events') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                My Events
            </a>
            <a href="{{ route('boarding.manage.my_tasks') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                My Tasks
            </a>
            <a href="{{ route('boarding.manage.configure') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                Configure Tasks
            </a>
        </div>
    </div>
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <h2 class="h2 mb-2">On/Offboarding Management</h2>
        <p class="p">Handle employee onboarding and offboarding processes including tasks, events, and templates.</p>
    </div>
@endsection
