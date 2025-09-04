@extends('layouts.app')

@section('page-title','Recruitment Management')

{{-- Taskbar specific to Recruitment --}}
@section('taskbar')
    <!-- Candidates -->
    <a href="{{ route('recruitment.candidates') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1">
        <span>Candidates</span>
    </a>

    <!-- Vacancies -->
    <a href="{{ route('recruitment.vacancies') }}" 
       class="btn btn-primary text-xs flex items-center gap-1">
        <span>Vacancies</span>
    </a>

    <!-- Configuration Dropdown (click) -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
            class="btn btn-primary text-xs flex items-center gap-1"
            :class="open 
            ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' 
            : 'hover:bg-[var(--color-secondary)] hover:font-bold'">
            <span>Configuration</span>
            <x-heroicon-o-chevron-down class="w-4 h-4 ml-1"/>
        </button>
        <div x-show="open" @click.outside="open = false"
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[240px] z-50 text-xs text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">

            <a href="{{ route('recruitment.configuration.vacancy_templates') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                Vacancy Templates
            </a>

            <a href="{{ route('recruitment.configuration.standard_tests') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                Standard Tests
            </a>

            <a href="{{ route('recruitment.configuration.document_templates') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                Document Templates
            </a>

            <a href="{{ route('recruitment.configuration.email_templates') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                Email Templates
            </a>

            <a href="{{ route('recruitment.configuration.candidate_sources') }}" 
               class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                Candidate Sources
            </a>
        </div>
    </div>
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
        <h2 class="h2 mb-2">Recruitment Management</h2>
        <p class="p">Manage candidates, vacancies, tests, and templates.</p>
    </div>
@endsection
