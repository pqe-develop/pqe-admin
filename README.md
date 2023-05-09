# Package pqe-admin
Framework to manage some data on laravel apps for PQE Group

 * See [Usage](#usage) for guidance on how to use this repository.
 * See [Get Started](#getStarted) for examples.

# Installation
`composer require pqe-develop/pqe-admin`

# Get Started


composer create-project laravel/laravel {app name}

composer require pqe-develop/pqe-admin

- set database in .env file and assign rights for crud operations for user inserted
- set LDAP env in .env file
- check if exists admdb database and is accessible
--- 
    GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, REFERENCES, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON `laravel`.* TO `pqeadmin`@`%`;
    GRANT SELECT, INSERT, UPDATE, DELETE ON `admdb`.* TO `pqeadmin`@`%`;


php artisan migrate
--> CAREFUL: users, roles and permissions will be erased if exists !!!!

php artisan db:seed --class="Pqe\Admin\Database\Seeders\DatabaseSeeder"
    
composer require laravel/ui
composer require laravel/passport
php artisan passport:install
php artisan vendor:publish --provider="Adldap\Laravel\AdldapServiceProvider"

edit routes/web.api and add this:
    Route::redirect('/', '/login');   // to redirect to login at first time
    Route::get('/home', 'HomeController@index')->name('home');
    
activate $namespace in RouteServiceProvider  

copy src/resources/views/templates/home.blade.php to resources/views/home.blade.php
copy src/resources/views/templates/admin.blade.php to resources/views/layouts/admin.blade.php

copy src/resources/lang/en/template-panel.php to resources/lang/en/panel.php and set internal values
copy src/Toolkit to public
copy src/Controllers/template-HomeController.php to app/Http/Controllers/HomeController.php and adapt it

rm app/Models/User.php 
edit config/auth.php 
    App\Models\User => Pqe\Admin\Models\User

php artisan route:cache
php artisan route:list

php artisan serve

# Usage

/login => to login page

/admin => to open admin menu

# Samples

# License
Apache License 2.0 - 2004

PQE Group Srl TM
© All rights reserved.
