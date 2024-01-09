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
        $this->call(PermissionRoleTableSeeder::class);
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "Errors on PermissionRole\n";
        }
        try {
        $this->call(TeamUserTableSeeder::class);
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "Errors on TeamUser\n";
        }
        try {
            $this->call(DropdownsTableSeeder::class);
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "Errors on Dropdowns\n";
        }
    }
}
