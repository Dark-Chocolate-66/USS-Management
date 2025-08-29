<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', fn() => redirect()->route('dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ==========================
    // HR Administration
    // ==========================
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

    // ==========================
    // Employee Management
    // ==========================
    Route::prefix('employees')->name('employees.')->group(function () {
        Route::view('/', 'employees/index')->name('index');      
        Route::view('/create', 'employees/create')->name('create'); 
        Route::view('/search', 'employees/search')->name('search'); 
        Route::view('/filter', 'employees/filter')->name('filter'); 
        Route::view('/myinfo', 'employees/myinfo')->name('myinfo');
        Route::view('/directory', 'employees/directory')->name('directory');
        Route::view('/buzz', 'employees/buzz')->name('buzz');

        // Announcements (reuse HR views)
        Route::prefix('announcements')->name('announcements.')->group(function () {
            Route::view('/news', 'hr/more/announcements/news')->name('news');
            Route::view('/documents', 'hr/more/announcements/documents')->name('documents');
            Route::view('/documents-category', 'hr/more/announcements/documents-category')->name('documents-category');
        });

        // Organization
        Route::prefix('organization')->name('organization.')->group(function(){
            Route::view('/config','employees/more/organization/config')->name('config');
            Route::view('/define','employees/more/organization/define')->name('define');
            Route::view('/view','employees/more/organization/view')->name('view');
        });

        // Competencies
        Route::prefix('competencies')->name('competencies.')->group(function(){
            Route::view('/list','employees/more/competencies/list')->name('list');
        });

        // Qualifications
        Route::prefix('qualifications')->name('qualifications.')->group(function(){
            Route::view('/skills','employees/more/qualifications/skills')->name('skills');
            Route::view('/education','employees/more/qualifications/education')->name('education');
            Route::view('/licenses','employees/more/qualifications/licenses')->name('licenses');
            Route::view('/languages','employees/more/qualifications/languages')->name('languages');
            Route::view('/memberships','employees/more/qualifications/memberships')->name('memberships');
        });

        // Manage
        Route::prefix('manage')->name('manage.')->group(function(){
            Route::view('/bulkupdate','employees/more/manage/bulkupdate')->name('bulkupdate');
        });

        // Config
        Route::prefix('config')->name('config.')->group(function(){
            Route::view('/optional','employees/more/config/optional')->name('optional');
            Route::view('/sections','employees/more/config/sections')->name('sections');
            Route::view('/reporting','employees/more/config/reporting')->name('reporting');        
            Route::view('/wizard','employees/more/config/wizard')->name('wizard');
            Route::view('/termination','employees/more/config/termination')->name('termination');
            Route::view('/directory','employees/more/config/directory')->name('directory');
            Route::view('/emailtemplates','employees/more/config/emailtemplates')->name('emailtemplates');
            Route::view('/documenttemplates','employees/more/config/documenttemplates')->name('documenttemplates'); 
            Route::view('/schedule','employees/more/config/schedule')->name('schedule');  
            Route::view('/salary','employees/more/config/salary')->name('salary');
            Route::view('/events','employees/more/config/events')->name('events');     
        });

        Route::view('nationalities','employees/nationalities')->name('nationalities');

        // Assets
        Route::prefix('assets')->name('assets.')->group(function(){
            Route::view('/view','employees/more/assets/view')->name('view');
            Route::view('/brands','employees/more/assets/brands')->name('brands');
            Route::view('/categories','employees/more/assets/categories')->name('categories');
            Route::view('/vendors','employees/more/assets/vendors')->name('vendors');
        });

        Route::view('/icalendar','employees/more/icalendar')->name('icalendar');
        Route::view('/dashboard','employees/dashboard')->name('dashboard');

        // Discipline
        Route::prefix('discipline')->name('discipline.')->group(function(){
            Route::view('/cases','employees/more/discipline/cases')->name('cases');
            Route::view('/documents','employees/more/discipline/casesdocuments')->name('documents');
        });

        // Purge
        Route::prefix('purge')->name('purge.')->group(function(){
            Route::view('/employee','employees/more/purge/employee')->name('employee');
            Route::view('/candidate','employees/more/purge/candidate')->name('candidate');
        });
        Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');
    });

    // ==========================
    // Other Global Modules
    // ==========================
    Route::view('/leave', 'leave/index')->name('leave.index');
    Route::view('/attendance', 'attendance/index')->name('attendance.index');
    Route::view('/recruitment', 'recruitment/index')->name('recruitment.index');
    Route::view('/performance', 'performance/index')->name('performance.index');
    Route::view('/settings', 'settings/index')->name('settings.index');
    Route::view('/reports', 'reports/index')->name('reports.index');
    Route::view('/boarding', 'boarding/index')->name('boarding.index');
    Route::view('/career', 'career/index')->name('career.index');
    Route::view('/request', 'request/index')->name('request.index');
    Route::view('/survey', 'survey/index')->name('survey.index');
    Route::view('/integration', 'integration/index')->name('integration.index');
    Route::view('/time', 'time/index')->name('time.index');
    Route::view('/roster', 'roster/index')->name('roster.index');
    Route::view('/goal', 'goal/index')->name('goal.index');
    Route::view('/training', 'training/index')->name('training.index');

    // Global Search
    Route::get('/search', function () {
        // implement global search logic
    })->name('search');
});
