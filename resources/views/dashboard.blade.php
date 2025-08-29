@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('taskbar')
    <a href="{{ route('employees.index') }}" class="btn btn-primary text-xs">+ Add Employee</a>
    <a href="{{ route('reports.index') }}" class="btn btn-primary text-xs">View Reports</a>
@endsection

@section('content')
<div class="card">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-slate-400">Pending Approvals</p>
            <p class="text-2xl font-semibold">{{ $stats['pendingApprovals'] ?? 0 }}</p>
        </div>
        <x-heroicon-o-bell-alert class="w-8 h-8" />
    </div>
</div>

<div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-4">
    <section class="card lg:col-span-2">
        <div class="flex items-center justify-between mb-3">
            <h2 class="h2">Recent Leaves</h2>
            <a href="{{ route('leave.index') }}" class="link-muted">View all</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="text-slate-400">
                    <tr>
                        <th class="text-left py-2 pr-4">Employee</th>
                        <th class="text-left py-2 pr-4">Type</th>
                        <th class="text-left py-2 pr-4">Dates</th>
                        <th class="text-left py-2 pr-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($recentLeaves as $leave)
                        <tr>
                            <td class="py-2 pr-4">{{ $leave->employee->name }}</td>
                            <td class="py-2 pr-4">{{ $leave->type }}</td>
                            <td class="py-2 pr-4">{{ $leave->from->format('d M') }}–{{ $leave->to->format('d M, Y') }}</td>
                            <td class="py-2 pr-4">
                                <span class="badge">{{ ucfirst($leave->status) }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-slate-500">No recent leaves.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="card">
        <div class="flex items-center justify-between mb-3">
            <h2 class="h2">Upcoming Birthdays</h2>
            <a href="{{ route('employees.index') }}" class="link-muted">All employees</a>
        </div>
        <ul class="space-y-2">
            @forelse($birthdays as $b)
                <li class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="https://i.pravatar.cc/32?u={{ $b->id }}" class="w-8 h-8 rounded-full"/>
                        <span>{{ $b->name }}</span>
                    </div>
                    <span class="text-slate-400 text-sm">{{ $b->dob->format('d M') }}</span>
                </li>
            @empty
                <li class="text-slate-500">No birthdays this month.</li>
            @endforelse
        </ul>
    </section>
</div>
@endsection
