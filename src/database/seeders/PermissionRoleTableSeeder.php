<?php

namespace Pqe\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder {

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
//         DB::table('permission_role')->delete();

        DB::table('permission_role')->insert(
                array(
                    0 => array(
                        'role_id' => '14',
                        'permission_id' => '9',
                    ),
                    1 => array(
                        'role_id' => '14',
                        'permission_id' => '14',
                    ),
                    2 => array(
                        'role_id' => '14',
                        'permission_id' => '26',
                    ),
                    3 => array(
                        'role_id' => '14',
                        'permission_id' => '31',
                    ),
                    4 => array(
                        'role_id' => '14',
                        'permission_id' => '35',
                    ),
                    5 => array(
                        'role_id' => '14',
                        'permission_id' => '42',
                    ),
                    7 => array(
                        'role_id' => '14',
                        'permission_id' => '113',
                    ),
                    8 => array(
                        'role_id' => '1',
                        'permission_id' => '2',
                    ),
                    9 => array(
                        'role_id' => '1',
                        'permission_id' => '9',
                    ),
                    10 => array(
                        'role_id' => '1',
                        'permission_id' => '14',
                    ),
                    11 => array(
                        'role_id' => '1',
                        'permission_id' => '26',
                    ),
                    12 => array(
                        'role_id' => '1',
                        'permission_id' => '31',
                    ),
                    13 => array(
                        'role_id' => '1',
                        'permission_id' => '35',
                    ),
                    14 => array(
                        'role_id' => '1',
                        'permission_id' => '42',
                    ),
                    16 => array(
                        'role_id' => '1',
                        'permission_id' => '68',
                    ),
                    17 => array(
                        'role_id' => '1',
                        'permission_id' => '71',
                    ),
                    18 => array(
                        'role_id' => '1',
                        'permission_id' => '84',
                    ),
                    19 => array(
                        'role_id' => '1',
                        'permission_id' => '87',
                    ),
                    20 => array(
                        'role_id' => '1',
                        'permission_id' => '106',
                    ),
                    21 => array(
                        'role_id' => '1',
                        'permission_id' => '109',
                    ),
                    22 => array(
                        'role_id' => '1',
                        'permission_id' => '113',
                    ),
                    23 => array(
                        'role_id' => '1',
                        'permission_id' => '114',
                    ),
                    24 => array(
                        'role_id' => '1',
                        'permission_id' => '119',
                    ),
                    25 => array(
                        'role_id' => '1',
                        'permission_id' => '120',
                    ),
                    26 => array(
                        'role_id' => '1',
                        'permission_id' => '632',
                    ),
                    27 => array(
                        'role_id' => '1',
                        'permission_id' => '633',
                    ),
                    28 => array(
                        'role_id' => '1',
                        'permission_id' => '1',
                    ),
                ));
    }
}