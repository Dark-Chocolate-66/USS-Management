<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HRM System</title>
    @vite(['resources/css/app.css','resources/js/app.js']) {{-- Tailwind --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="bg-[var(--color-bg)] text-[var(--color-primarytext)]">
    <div class="flex overflow-visible">
        <!-- Sidebar -->
        <aside x-data="{ open: true }"
   :class="open ? 'w-64' : 'w-20'"
   class="sidebar relative h-screen flex flex-col shadow-xl transition-all duration-300">
            <!-- Company Name -->
    <h2 class="mb-6 text-sm font-bold text-center text-[var(--color-primary)]">
        <span x-show="open">Ultrasoft Systems</span>
        <span x-show="!open" class="text-lg font-extrabold">U</span>
    </h2>

    <!-- Profile Section -->
    <div class="flex flex-col items-center mb-6">
        <!-- Profile Picture -->
        <img src="{{ asset('images/profile.png') }}" 
             alt="Profile Picture" 
             :class="open ? 'w-20 h-20' : 'w-8 h-8'"
             class="rounded-full border-2 border-[var(--color-bg)] shadow-md transition-all duration-300">

        <!-- Name + Designation only if open -->
        <div x-show="open" class="text-center mt-3">
            <h3 class="text-lg font-semibold text-[var(--color-primarytext)]">John Doe</h3>
            <p class="text-sm text-[var(--color-secondtext)]">Administrator</p>
        </div>
    </div>

     <!-- Search Bar (optional: hide when collapsed) -->
    <div x-show="open" class="relative px-2">
        <button class="mb-4 absolute inset-y-0 left-0 flex items-center pl-3">
            <x-heroicon-o-magnifying-glass class="h-5 w-5 bg-[var(--color-bg)] text-[var(--color-primary)]"/>
        </button>
        <input type="text" placeholder="Search"
               class="mb-4 pl-10 pr-4 py-2 w-full rounded bg-[var(--color-bg)] text-xs text-[var(--color-primarytext)] focus:outline-none border border-[var(--color-bg)]">
    </div>
     <div class="flex-1 overflow-y-auto custom-scrollbar text-xs">
        <nav class="flex flex-col space-y-1 text-[var(--color-primarytext)]">
                <!--menu item -->
                <a href="{{ route('hr.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('hr.*') ? 'active' : '' }}"><x-heroicon-o-clipboard-document-list class="w-5 h-5 flex-shrink-0"/><span x-show="open">HR Administration</span></a>
                <a href="{{ route('employees.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('employees.index*') ? 'active' : '' }}"><x-heroicon-o-user-group class="w-5 h-5 flex-shrink-0"/><span x-show="open">Employee Management</span></a>
                <a href="{{ route('reports.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('reports.*') ? 'active' : '' }}"><x-heroicon-o-document-chart-bar class="w-5 h-5 flex-shrink-0"/><span x-show="open">Reports</span></a>
                <a href="{{ route('leave.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('leave.*') ? 'active' : '' }}"><x-heroicon-o-briefcase class="w-5 h-5 flex-shrink-0"/><span x-show="open">Leave</span></a>
                <a href="{{ route('time.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('time.*') ? 'active' : '' }}"><x-heroicon-o-clock class="w-5 h-5 flex-shrink-0"/><span x-show="open">Time Tracking</span></a>
                <a href="{{ route('attendance.index') }}" class="menu-item flex items-center gap-2{{ request()->routeIs('attendance.*') ? 'active' : '' }}"><x-heroicon-o-clipboard-document-check class="w-5 h-5 flex-shrink-0"/><span x-show="open">Attendance</span></a>
                <a href="{{ route('roster.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('roster.*') ? 'active' : '' }}"><x-heroicon-o-calendar-date-range class="w-5 h-5 flex-shrink-0"/><span x-show="open">Roster</span></a>
                <a href="{{ route('recruitment.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('recruitment.*') ? 'active' : '' }}"><x-heroicon-o-user-plus class="w-5 h-5 flex-shrink-0"/><span x-show="open">Recruitment(ATS)</span></a>
                <a href="{{ route('boarding.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('boarding.*') ? 'active' : '' }}"><x-heroicon-o-paper-airplane class="w-5 h-5 flex-shrink-0"/><span x-show="open">On/Offboarding</span></a>
                <a href="{{ route('training.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('training.*') ? 'active' : '' }}"><x-heroicon-o-wrench-screwdriver class="w-5 h-5 flex-shrink-0"/><span x-show="open">Training<span x-show="open"></a>
                <a href="{{ route('goal.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('goal.*') ? 'active' : '' }}"><x-heroicon-o-list-bullet class="w-5 h-5 flex-shrink-0"/><span x-show="open">Goals</span></a>
                <a href="{{ route('performance.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('performance.*') ? 'active' : '' }}"><x-heroicon-o-chart-bar class="w-5 h-5 flex-shrink-0"/><span x-show="open">Performance</span></a>
                <a href="{{ route('career.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('career.*') ? 'active' : '' }}"><x-heroicon-o-academic-cap class="w-5 h-5 flex-shrink-0"/><span x-show="open">Career Development</span></a>
                <a href="{{ route('request.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('request.*') ? 'active' : '' }}"><x-heroicon-o-envelope class="w-5 h-5 flex-shrink-0"/><span x-show="open">Request Desk</span></a>
                <a href="{{ route('integration.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('integration.*') ? 'active' : '' }}"><x-heroicon-o-cog-8-tooth class="w-5 h-5 flex-shrink-0"/><span x-show="open">Integrations</span></a>
                <a href="{{ route('survey.index') }}" class="menu-item flex items-center gap-2 {{ request()->routeIs('survey.*') ? 'active' : '' }}"><x-heroicon-o-pencil-square class="w-5 h-5 flex-shrink-0"/><span x-show="open">Surveys</span></a>
                
                
            </nav>
</div>
    <button @click="open = !open" class="btn btn-toggle">
    <span x-show="open">
        <x-heroicon-o-chevron-left class="w-4 h-4"/>
    </span>
    <span x-show="!open">
        <x-heroicon-o-chevron-right class="w-4 h-4"/>
    </span>
</button>

        </aside>
        <!-- Main content -->
        <div class="flex-1 flex flex-col main-content">
            <!-- Navbar -->
            <header class="flex items-center justify-between px-6 py-3 bg-[var(--color-primary)] shadow-md">
                <h1 class="text-lg font-semibold text-[var(--color-mainbg)]">
                    @yield('page-title', 'Dashboard')
                </h1>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-secondary text-xs">Logout</button>
                </form>
            </header>

            <!-- Taskbar -->
            <div class="flex items-center gap-3 px-6 py-2 bg-[var(--color-mainbg)] shadow-sm">
                <!-- Home button -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-1 text-[var(--color-primarytext)] hover:text-[var(--color-texthover)]">
                    <x-heroicon-o-home class="w-5 h-5"/>
                </a>

                <!-- Contextual buttons -->
                @yield('taskbar')
            </div>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
