@extends('layouts.app')

@section('page-title', 'Employee Management')

@section('taskbar')
    <!-- <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a> -->
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">View Employees</a>
@endsection

@section('content')
    <h2 class="text-xl font-bold">Employees List</h2>
    <!-- Your table here -->
@endsection
