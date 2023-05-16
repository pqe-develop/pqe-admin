<?php

namespace Pqe\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder {

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
        DB::table('role_user')->delete();

        DB::table('role_user')->insert(
                array(
                    0 => array(
                        'user_id' => '3',
                        'role_id' => '1',
                    ),
                    1 => array(
                        'user_id' => '2161',
                        'role_id' => '14',
                    ),
                    2 => array(
                        'user_id' => '2199',
                        'role_id' => '1',
                    ),
                ));
    }
}