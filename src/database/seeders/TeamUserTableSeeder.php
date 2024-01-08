<?php

namespace Pqe\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamUserTableSeeder extends Seeder {

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
//         DB::table('team_user')->delete();

        DB::table('team_user')->insert(array(
            0 => array(
                'team_id' => '1',
                'user_id' => '2161',
            ),
        ));
    }
}