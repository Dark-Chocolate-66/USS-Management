@extends('layouts.app')

@section('page-title','Employee Management')

{{-- Taskbar specific to Employee Management --}}
@section('taskbar')

    <!-- Employee List -->
    <a href="{{ route('employees.index') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1 
              {{ request()->routeIs('employees.index') ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' : '' }}">
        <span>Employee List</span>
    </a>

    <!-- My Info -->
    <a href="{{ route('employees.myinfo') }}" 
       class="btn btn-primary text-xs flex items-center gap-1
              {{ request()->routeIs('employees.myinfo') ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' : '' }}">
        <span>My Info</span>
    </a>

    <!-- More Dropdown -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" 
            class="btn btn-primary text-xs flex items-center gap-1"
            :class="open 
            ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' 
            : 'hover:bg-[var(--color-secondary)] hover:font-bold'">
            <span>More</span>
            <x-heroicon-o-chevron-down class="w-4 h-4 ml-1"/>
        </button>

        <!-- More Menu -->
        <div x-show="open" @click.outside="open = false"
             class="absolute mt-1 bg-[var(--color-mainbg)] border rounded shadow-md min-w-[250px] z-50 text-xs 
                    text-[var(--color-secondtext)] hover:text-[var(--color-primarytext)] p-2">
            <!-- Directory -->
            <a href="{{ route('employees.directory') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Directory</a>

            <!-- Buzz -->
            <a href="{{ route('employees.buzz') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Buzz</a>

            <!-- Announcements -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Announcements
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs p-2">
                    <a href="{{ route('employees.announcements.documents') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Documents</a>
                    <a href="{{ route('employees.announcements.news') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">News</a>
                </div>
            </div>

            <!-- Organization Chart -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Organization Chart
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs p-2">
                    <a href="{{ route('employees.organization.config') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Config</a>
                    <a href="{{ route('employees.organization.define') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Define Position</a>
                    <a href="{{ route('employees.organization.view') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">View</a>
                </div>
            </div>

            <!-- Competencies -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Competencies
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs p-2">
                    <a href="{{ route('employees.competencies.list') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Competency List</a>
                </div>
            </div>

            <!-- Qualifications -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Qualifications
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[220px] text-xs p-2">
                    <a href="{{ route('employees.qualifications.skills') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Skills</a>
                    <a href="{{ route('employees.qualifications.education') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Education</a>
                    <a href="{{ route('employees.qualifications.licenses') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Licenses</a>
                    <a href="{{ route('employees.qualifications.languages') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Languages</a>
                    <a href="{{ route('employees.qualifications.memberships') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Memberships</a>
                </div>
            </div>

            <!-- Manage Data -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Manage Data
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs p-2">
                    <a href="{{ route('employees.manage.bulkupdate') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Bulk Update</a>
                </div>
            </div>

            <!-- Configurations -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Configurations
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[250px] text-xs p-2 
                    max-h-60 overflow-y-auto custom-scrollbar">
                    <a href="{{ route('employees.config.optional') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Optional Fields</a>
                    <a href="{{ route('employees.config.sections') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Custom Field Sections</a>
                    <a href="{{ route('employees.config.reporting') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Reporting Methods</a>
                    <a href="{{ route('employees.config.wizard') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Add Employee Wizard</a>
                    <a href="{{ route('employees.config.termination') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Termination Reasons</a>
                    <a href="{{ route('employees.config.directory') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Directory Configuration</a>
                    <a href="{{ route('employees.config.emailtemplates') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Email Templates</a>
                    <a href="{{ route('employees.config.documenttemplates') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Document Templates</a>
                    <a href="{{ route('employees.config.schedule') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Work Schedule</a>
                    <a href="{{ route('employees.config.salary') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Salary Fields Visibility</a>
                    <a href="{{ route('employees.config.events') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Job & Salary Events</a>
                </div>   
            </div>

            <!-- Nationalities -->
            <a href="{{ route('employees.nationalities') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Nationalities</a>

            <!-- Assets -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Assets
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs p-2">
                    <a href="{{ route('employees.assets.view') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">View Assets</a>
                    <a href="{{ route('employees.assets.brands') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Brands</a>
                    <a href="{{ route('employees.assets.categories') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Categories</a>
                    <a href="{{ route('employees.assets.vendors') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Vendors</a>
                </div>
            </div>

            <!-- iCalendar Feeds -->
            <a href="{{ route('employees.icalendar') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">iCalendar Feeds</a>

            <!-- Dashboard -->
            <a href="{{ route('employees.dashboard') }}" class="block px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Dashboard</a>

            <!-- Discipline -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Discipline
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs p-2">
                    <a href="{{ route('employees.discipline.cases') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Discipline Cases</a>
                    <a href="{{ route('employees.discipline.documents') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Document Templates</a>
                </div>
            </div>

            <!-- Purge Records -->
            <div class="relative group">
                <a href="#" class="flex items-center gap-1 px-3 py-3 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">
                    <x-heroicon-o-chevron-left class="w-4 h-4 mr-2"/> Purge Records
                </a>
                <div class="absolute right-full top-0 hidden group-hover:block bg-[var(--color-mainbg)] border rounded shadow-md min-w-[200px] text-xs p-2">
                    <a href="{{ route('employees.purge.employee') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Employee Records</a>
                    <a href="{{ route('employees.purge.candidate') }}" class="block px-3 py-2 hover:bg-[var(--color-bg)] hover:font-bold rounded-md">Candidate Records</a>
                </div>
            </div>
          </div>
    </div>

    {{-- 🔍 Search + Filter + Help + Shortcuts --}}
    <div class="ml-auto flex items-center gap-2">
        <!-- Search input -->
        <form action="{{ route('employees.search') }}" method="GET" class="relative flex items-center">
        <div class="relative">
            <input type="text" name="q" placeholder="Employee Name"
                   class="text-xs px-3 py-1 rounded-none bg-[var(--color-mainbg)] border-l border-b border-gray-300 focus:outline-none"/>
            
            <!-- Turn magnifying glass into button -->
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
        <h2 class="h2 mb-2">Employee Management</h2>
        <p class="p">Employees, info, competencies, qualifications, and more.</p>
    </div>
@endsection
