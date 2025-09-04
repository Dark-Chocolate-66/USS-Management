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
    // ============================
    // Reports & Analytics
    // ============================
        Route::prefix('reports')->name('reports.')->group(function () {
        Route::redirect('/', '/reports/list')->name('index');

        Route::view('/list', 'reports.reportlist')->name('list');
        Route::view('/scheduled', 'reports.scheduled')->name('scheduled');
    });
    // ===============================
    // Leave Management
    // ===============================
    Route::prefix('leave')->name('leave.')->group(function () {
    Route::redirect('/', '/leave/list')->name('index');

    // Direct pages
    Route::view('/list', 'leave.list')->name('list');
    Route::view('/assign', 'leave.assign')->name('assign');
    Route::view('/bulk-assign', 'leave.bulk_assign')->name('bulk');
    Route::view('/apply', 'leave.apply')->name('apply');
    Route::view('/usage', 'leave.my_leave_usage')->name('usage');

    // More dropdown
    Route::view('/calendar', 'leave.more.leave_calendar')->name('calendar');
    Route::view('/my-leave', 'leave.more.my_leave')->name('my_leave');

    // Entitlements
    Route::prefix('entitlements')->name('entitlements.')->group(function () {
        Route::view('/add', 'leave.more.entitlements.add')->name('add');
        Route::view('/list', 'leave.more.entitlements.list')->name('list');
        Route::view('/my', 'leave.more.entitlements.my')->name('my');
    });

    // Configure
    Route::prefix('configure')->name('configure.')->group(function () {
        Route::view('/period', 'leave.more.configure.period')->name('period');
        Route::view('/types', 'leave.more.configure.types')->name('types');
        Route::view('/holidays', 'leave.more.configure.holidays')->name('holidays');
        Route::view('/weekends', 'leave.more.configure.weekends')->name('weekends');
        Route::view('/bradford', 'leave.more.configure.bradford')->name('bradford');
        Route::view('/notifications', 'leave.more.configure.notifications')->name('notifications');
        Route::view('/calendar', 'leave.more.configure.calendar')->name('calendar');
    });
});

    // ==========================
    // Time Tracking
    // ==========================
    Route::prefix('time')->name('time.')->group(function () {
    Route::redirect('/', '/time/timesheets')->name('index');

    // Main
    Route::view('/timesheets', 'time.index')->name('timesheets');
    Route::view('/my', 'time.more.mytimesheets')->name('my');

    // Activity Info
    Route::prefix('info')->name('info.')->group(function () {
        Route::view('/activities', 'time.more.info.activities')->name('activities');
        Route::view('/customers', 'time.more.info.customers')->name('customers');
        Route::view('/projects', 'time.more.info.projects')->name('projects');
    });

    // Configure
    Route::prefix('configuration')->name('configuration.')->group(function () {
        Route::view('/periods', 'time.more.configuration.periods')->name('periods');
    });

     // Search
    Route::view('/search', 'time.search')->name('search');
});

    //=====================
    // Attendance
    //=====================
    Route::prefix('attendance')->name('attendance.')->group(function () {
    Route::view('/sheets', 'attendance.sheets')->name('sheets');
    Route::view('/approve', 'attendance.approve')->name('approve');
    Route::view('/records', 'attendance.records')->name('records');
    Route::view('/punch', 'attendance.punch')->name('punch');

    // More dropdown
    Route::view('/my-sheet', 'attendance.more.my_sheet')->name('my_sheet');
    Route::view('/my-monthly', 'attendance.more.my_monthly')->name('my_monthly');
    Route::view('/policies', 'attendance.more.policies')->name('policies');
    Route::view('/upload', 'attendance.more.upload')->name('upload');
    Route::view('/configuration', 'attendance.more.configuration')->name('configuration');
});

    // ==========================
    // Recruitment
    // ==========================
        Route::prefix('recruitment')->name('recruitment.')->group(function () {
    // Main Recruitment index with taskbar
    Route::view('/', 'recruitment.index')->name('index');

    // Direct pages (they extend recruitment.index)
    Route::view('/candidates', 'recruitment.candidates')->name('candidates');
    Route::view('/vacancies', 'recruitment.vacancies')->name('vacancies');

    // Configuration dropdown
    Route::prefix('configuration')->name('configuration.')->group(function () {
        Route::view('/vacancy-templates', 'recruitment.configuration.vacancy_templates')->name('vacancy_templates');
        Route::view('/standard-tests', 'recruitment.configuration.standard_tests')->name('standard_tests');
        Route::view('/document-templates', 'recruitment.configuration.document_templates')->name('document_templates');
        Route::view('/email-templates', 'recruitment.configuration.email_templates')->name('email_templates');
        Route::view('/candidate-sources', 'recruitment.configuration.candidate_sources')->name('candidate_sources');
    });
});

// ==========================
// On/Offboarding
// ==========================
    // On/Offboarding
Route::prefix('boarding')->name('boarding.')->group(function () {
    // Main entry
    Route::view('/', 'boarding.index')->name('index');

    // Direct page
    Route::view('/preboarding', 'boarding.preboarding')->name('preboarding');

    // On/Offboarding dropdown
    Route::prefix('manage')->name('manage.')->group(function () {
        Route::view('/events', 'boarding.manage.events')->name('events');
        Route::view('/tasks', 'boarding.manage.tasks')->name('tasks');
        Route::view('/my-events', 'boarding.manage.my_events')->name('my_events');
        Route::view('/my-tasks', 'boarding.manage.my_tasks')->name('my_tasks');
        Route::view('/configure', 'boarding.manage.configure')->name('configure');
    });
});

// ==========================
// Training
// ==========================
Route::prefix('training')->name('training.')->group(function () {
    // Main index
    Route::view('/', 'training.index')->name('index');

    // Direct buttons
    Route::view('/courses', 'training.courses')->name('courses');
    Route::view('/sessions', 'training.sessions')->name('sessions');
    Route::view('/my-participating-sessions', 'training.my_participating_sessions')->name('my-participating');


    // More dropdown
    Route::prefix('more')->name('more.')->group(function () {
        // Online Assessment Courses (sub-dropdown)
        Route::prefix('online-assessments')->name('online_assessments.')->group(function () {
            Route::view('/employee', 'training.more.online_assessments.employee')->name('employee');
            Route::view('/my', 'training.more.online_assessments.my')->name('my');
            Route::view('/courses', 'training.more.online_assessments.courses')->name('courses');
            Route::view('/certificate-template', 'training.more.online_assessments.certificate_template')->name('certificate_template');
        });
    });
});

// ==========================
// Goals
// ==========================
Route::prefix('goals')->name('goals.')->group(function () {
    // When visiting /goals → show index.blade.php
    Route::view('/', 'goals.index')->name('index');

    // Sub-pages
    Route::view('/list', 'goals.list')->name('list');
    Route::view('/my', 'goals.my')->name('my');
    Route::view('/library', 'goals.library')->name('library');
});

// ==========================
// Performance
// ==========================
Route::prefix('performance')->name('performance.')->group(function () {
    // Main index
    Route::view('/', 'performance.index')->name('index');

    // Main buttons
    Route::view('/appraisals', 'performance.appraisals')->name('appraisals');
    Route::view('/cycles', 'performance.cycles')->name('cycles');
    Route::view('/search', 'performance.search')->name('search');
    Route::view('/filter', 'performance.filter')->name('filter');

    // More dropdown
    Route::prefix('more')->name('more.')->group(function () {
        Route::view('/my-appraisals', 'performance.more.my-appraisals')->name('my-appraisals');
        Route::view('/competency-profiles', 'performance.more.competency-profiles')->name('competency-profiles');

        // Employee Trackers
        Route::prefix('trackers')->name('trackers.')->group(function () {
            Route::view('/list', 'performance.more.trackers.list')->name('list');
            Route::view('/my', 'performance.more.trackers.my')->name('my');
            Route::view('/manage', 'performance.more.trackers.manage')->name('manage');
        });

        // Configuration
        Route::prefix('configuration')->name('configuration.')->group(function () {
            Route::view('/appraisal', 'performance.more.configuration.appraisal')->name('appraisal');
        });
    });
});


    // ==========================
    // Other Global Modules
    // ==========================
    Route::view('/attendance', 'attendance/index')->name('attendance.index');
    Route::view('/settings', 'settings/index')->name('settings.index');
    Route::view('/career', 'career/index')->name('career.index');
    Route::view('/request', 'request/index')->name('request.index');
    Route::view('/survey', 'survey/index')->name('survey.index');
    Route::view('/integration', 'integration/index')->name('integration.index');
    Route::view('/roster', 'roster/index')->name('roster.index');
    
    // Global Search
    Route::get('/search', function () {
        // implement global search logic
    })->name('search');
});
