<?php

namespace Pqe\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Exception;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        try {
        $this->call(PermissionsTableSeeder::class);
        } catch (Exception $e) {
            echo "Errors on Permissions\n";
        }
        try {
        $this->call(RolesTableSeeder::class);
        } catch (Exception $e) {
            echo "Errors on Roles\n";
        }
        try {
        $this->call(PermissionRoleTableSeeder::class);
        } catch (Exception $e) {
            echo "Errors on PermissionRole\n";
        }
        try {
        $this->call(TeamUserTableSeeder::class);
        } catch (Exception $e) {
            echo "Errors on TeamUser\n";
        }
        try {
        $this->call(RoleUserTableSeeder::class);
        } catch (Exception $e) {
            echo "Errors on RoleUser\n";
        }
        try {
            $this->call(DropdownsTableSeeder::class);
        } catch (Exception $e) {
            echo "Errors on Dropdowns\n";
        }
    }
}
