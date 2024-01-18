<?php
use Illuminate\Support\Facades\Route;

// Auth

Route::group([
    'namespace' => 'Pqe\Admin\Controllers\Auth',
    'middleware' => [
        'web'
    ]
],
function () {
    Route::get('login', 'LoginController@showLoginForm')->name('auth.login');
    Route::post('login', 'LoginController@login')->name('login');
    // Route::get('logout', 'LoginController@logout')->name('logout');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

// Tables

Route::group([
    'namespace' => 'Pqe\Admin\Controllers',
    'middleware' => [
        'web',
        'auth'
    ]
],
function () {
//     Route::get('/home', 'HomeController@indexBlade')->name('home');
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    // Users
    Route::get('/admin', 'UsersController@indexShow')->name('users.index');
    //Route::post('users', 'UsersController@store')->name('users.store');
    Route::get('users/{user}', 'UsersController@show')->name('users.show');
    Route::put('users/{user}', 'UsersController@update')->name('users.update');
    Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');

    Route::get('user-alerts/read', 'UserAlertsController@read');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController',
            [
                'except' => [
                    'create',
                    'store',
                    'edit',
                    'update',
                    'destroy',
                ]
            ]);

    // User Alerts
    Route::delete('user-alerts/close', 'UserAlertsController@close')->name('user-alerts.close');
    Route::resource('user-alerts', 'UserAlertsController', [
        'except' => [
            'edit',
            'update'
        ]
    ]);

    // Teams
    Route::delete('teams/destroy', 'TeamsController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamsController');

    // Currencies
    Route::resource('currencies', 'CurrenciesController', [
        'only' => [
            'index',
            'show',
        ]
    ]);

    // Countries
    Route::resource('countries', 'CountriesController', [
        'only' => [
            'index',
            'show',
        ]
    ]);

    // Currency Histories
    Route::resource('currency-histories', 'CurrencyHistoryController', [
        'only' => [
            'index',
            'show',
        ]
    ]);

    // Companies
    Route::resource('companies', 'CompaniesController', [
        'only' => [
            'index',
            'show',
        ]
    ]);

    // Companies Bank Holidays
    Route::resource('companies-bank-holidays', 'CompaniesBankHolidaysController',
            [
                'only' => [
                    'index',
                    'show',
                ]
            ]);

    // Dropdown
    Route::delete('dropdowns/destroy', 'DropdownsController@massDestroy')->name('dropdowns.massDestroy');
    Route::resource('dropdowns', 'DropdownsController');
    Route::get('dependent-dropdown', 'DropdownsController@getDropdownValues')->name('dependent-dropdown');
    
    //Internal Training
    Route::resource('internal-trainings', 'InternalTrainingController');


    //visa Types
    Route::resource('visatypes', 'VisaTypeController');
    // Global Search
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});

