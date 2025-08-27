<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');




Route::middleware(['web','auth'])->group(function(){
Route::get('/', fn() => redirect()->route('dashboard'));
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// placeholders for modules
Route::view('/employees', 'employees/index')->name('employees.index');
Route::view('/leave', 'leave/index')->name('leave.index');
Route::view('/attendance', 'attendance/index')->name('attendance.index');
Route::view('/recruitment', 'recruitment/index')->name('recruitment.index');
Route::view('/performance', 'performance/index')->name('performance.index');
Route::view('/settings', 'settings/index')->name('settings.index');
Route::view('/reports','reports/index')->name('reports.index');
Route::view('/hr','hr/index')->name('hr.index');
Route::view('/boarding','boarding/index')->name('boarding.index');
Route::view('/career','career/index')->name('career.index');
Route::view('/request','request/index')->name('request.index');
Route::view('/survey','survey/index')->name('survey.index');
Route::view('/integration','integration/index')->name('integration.index');
Route::view('/time','time/index')->name('time.index');
Route::view('/roster','roster/index')->name('roster.index');
Route::view('/goal','goal/index')->name('goal.index');
Route::view('/training','training/index')->name('training.index');
Route::view('/employees/create', 'employees/create')->name('employees.create');


Route::get('/search', function(){ /* implement global search */ })->name('search');
});



?>