# Package pqe-admin
Framework to manage some data on laravel apps for PQE Group

 * See [Usage](#usage) for guidance on how to use this repository.
 * See [Get Started](#getStarted) for examples.

# Installation
`composer require pqe-develop/pqe-admin`

# Get Started

`composer create-project laravel/laravel {app name}`

`composer require pqe-develop/pqe-admin`

- set database in .env file and assign rights for crud operations for user inserted
- set LDAP env in .env file
- check if exists admdb database and is accessible
--- 
    GRANT SELECT, INSERT, UPDATE, DELETE ON `{db_name}`.* TO `{user_name}`@`%`;
    GRANT SELECT ON `admdb`.* TO `{user_name}`@`%`;

`php artisan migrate` => CAREFUL: users, roles and permissions will be erased if exists !!!!

`php artisan db:seed --class="Pqe\Admin\Database\Seeders\DatabaseSeeder"`

```
composer require laravel/ui
composer require laravel/passport
php artisan passport:install
php artisan vendor:publish --provider="Adldap\Laravel\AdldapServiceProvider"
```

edit `routes/web.php` and add this:
    Route::redirect('/', '/login');   // to redirect to login at first time
    
activate $namespace in RouteServiceProvider if needed

copy `src/resources/views/templates/admin.blade.php` to `resources/views/layouts/admin.blade.php`

copy `src/resources/lang/en/template-panel.php` to `resources/lang/en/panel.php` and set internal values

`rm app/Models/User.php` if exists 
edit `config/auth.php`
    App\Models\User => Pqe\Admin\Models\User

```
php artisan route:cache
php artisan route:list

php artisan serve (to test)
```

# Usage
`/login` => to login page

`/admin` => to open admin menu with _blank to open in another window

## Resources you can use to get started
- src/resources/views/templates/home.blade.php => template to copy for home blade
- src/Controllers/template-HomeController.php => template to copy for Home Controlling (to adapt)
- src/Toolkit => all js/css for bootstrap
- src/resources/lang/en => for labeling in english

# Samples

# License
Apache License 2.0 - 2004

PQE Group Srl TM
© All rights reserved.
