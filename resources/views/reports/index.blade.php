@extends('layouts.app')

@section('page-title','Reports & Analytics')

@section('taskbar')
    <!-- Reports -->
    <a href="{{ route('reports.list') }}" 
       class="btn btn-primary text-xs flex items-center ml-4 gap-1
              {{ request()->routeIs('reports.list') ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' : '' }}">
        <span>Reports</span>
    </a>

    <!-- Scheduled Reports -->
    <a href="{{ route('reports.scheduled') }}" 
       class="btn btn-primary text-xs flex items-center gap-1
              {{ request()->routeIs('reports.scheduled') ? 'bg-[var(--color-secondary)] font-bold text-[var(--color-texthover)]' : '' }}">
        <span>Scheduled Reports</span>
    </a>
@endsection

@section('content')
    @yield('reports-content')
@endsection
