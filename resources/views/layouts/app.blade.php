<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrangeHRM Replica</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile">
                <img src="https://via.placeholder.com/70" alt="User">
                <h3>User Name</h3>
                <p>Admin</p>
            </div>
            
            <div class="search">
                <input type="text" placeholder="Search...">
            </div>
            
            <nav>
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
        <main class="main">
            <div class="card--main">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
