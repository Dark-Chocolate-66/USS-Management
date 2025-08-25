<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrangeHRM Replica</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar__logo">OrangeHRM</div>
        <nav class="sidebar__nav">
            <a href="#">Dashboard</a>
            <a href="#">Employees</a>
            <a href="#">Leave</a>
            <a href="#">Reports</a>
        </nav>
    </aside>

    <!-- Navbar -->
    <header class="navbar">
        <div class="navbar__left">
            <h1>Dashboard</h1>
        </div>
        <div class="navbar__right">
            <span>User Name</span>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="card card--main">
            @yield('content')
        </div>
    </main>
</body>
</html>
