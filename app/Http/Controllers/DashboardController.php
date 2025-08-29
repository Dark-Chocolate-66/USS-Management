<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
public function index()
{
$stats = [
'employees' => 50,
'onLeave' => 3,
'openJobs' => 2,
'pendingApprovals' => 5,
];


$recentLeaves = collect(); // replace with Leave::latest()->with('employee')->take(5)->get();
$birthdays = collect(); // replace with Employee::birthdayThisMonth()->get();


return view('dashboard', compact('stats','recentLeaves','birthdays'));
}
}
?>