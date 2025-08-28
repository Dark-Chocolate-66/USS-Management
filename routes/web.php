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

// HR Administration routes
Route::prefix('hr')->name('hr.')->group(function () {
    Route::view('/', 'hr/index')->name('index');

    // Users & Roles
    Route::view('/users', 'hr/user')->name('users');
    Route::view('/roles', 'hr/roles')->name('roles');

    // Jobs
    Route::prefix('jobs')->name('jobs.')->group(function () {
        Route::view('/salary', 'hr/jobs/salary')->name('salary');
        Route::view('/titles', 'hr/jobs/titles')->name('titles');
        Route::view('/paygrades', 'hr/jobs/paygrades')->name('paygrades');
        Route::view('/statuses', 'hr/jobs/statuses')->name('statuses');
        Route::view('/categories', 'hr/jobs/categories')->name('categories');
    });

    // Organization
    Route::prefix('organization')->name('organization.')->group(function () {
        Route::view('/general', 'hr/organization/general')->name('general');
        Route::view('/locations', 'hr/organization/locations')->name('locations');
        Route::view('/structure', 'hr/organization/structure')->name('structure');
        Route::view('/costcenters', 'hr/organization/costcenters')->name('costcenters');
        Route::view('/eeofilings', 'hr/organization/eeofilings')->name('eeofilings');
    });

    // More
    Route::prefix('more')->name('more.')->group(function () {
        // Announcements
        Route::prefix('announcements')->name('announcements.')->group(function () {
            Route::view('/news', 'hr/more/announcements/news')->name('news');
            Route::view('/documents', 'hr/more/announcements/documents')->name('documents');
            Route::view('/documents-category', 'hr/more/announcements/documents-category')->name('documents-category');
        });

        // Config
        Route::prefix('config')->name('config.')->group(function () {
            Route::view('/email', 'hr/more/config/email')->name('email');
            Route::view('/localization', 'hr/more/config/localization')->name('localization');
            Route::view('/authentication', 'hr/more/config/authentication')->name('authentication');
            Route::view('/icalendar', 'hr/more/config/icalendar')->name('icalendar');
        });

        // Audit
        Route::view('/audit', 'hr/more/audit')->name('audit');
    });
});

Route::view('/employees', 'employees/index')->name('employees.index');
Route::view('/leave', 'leave/index')->name('leave.index');
Route::view('/attendance', 'attendance/index')->name('attendance.index');
Route::view('/recruitment', 'recruitment/index')->name('recruitment.index');
Route::view('/performance', 'performance/index')->name('performance.index');
Route::view('/settings', 'settings/index')->name('settings.index');
Route::view('/reports','reports/index')->name('reports.index');
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