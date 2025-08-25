@extends('layouts.app')

@section('content')
    <div class="grid">
        <div class="card card--accent">
            <h3>Pending Approvals</h3>
            <p>5 requests need your attention</p>
        </div>

        <div class="card card--success">
            <h3>Completed Tasks</h3>
            <p>42 done this week ✅</p>
        </div>

        <div class="card card--danger">
            <h3>System Alerts</h3>
            <p>3 critical issues</p>
        </div>
    </div>
@endsection
