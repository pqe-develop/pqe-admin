<?php

namespace Pqe\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Pqe\Admin\Models\Permission;
use Pqe\Admin\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Role::destroy([
            1,
            14
        ]);

        Permission::destroy(
                [
                    1,
                    2,
                    9,
                    14,
                    26,
                    31,
                    35,
                    42,
                    68,
                    71,
                    84,
                    87,
                    106,
                    109,
                    113,
                    114,
                    119,
                    120,
                    632,
                    633,
                ]);

        DB::table('roles')->insert(
                array(
                    0 => array(
                        'id' => '14',
                        'title' => 'Operator',
                        'created_at' => '2022-08-03 15:51:31',
                        'updated_at' => '2023-04-17 17:28:20',
                    ),
                    1 => array(
                        'id' => '1',
                        'title' => 'Admin',
                        'created_at' => '2022-08-05 14:50:13',
                        'updated_at' => '2023-04-17 17:24:33',
                    ),
                ));

        DB::table('permissions')->insert(
                array(
                    0 => array(
                        'id' => '2',
                        'title' => 'audit_log_access',
                        'created_at' => '2022-10-06 14:11:46',
                        'updated_at' => '2022-10-06 14:11:46',
                    ),
                    1 => array(
                        'id' => '9',
                        'title' => 'companies_bank_holiday_access',
                        'created_at' => '2022-10-06 14:11:46',
                        'updated_at' => '2022-10-06 14:11:46',
                    ),
                    2 => array(
                        'id' => '14',
                        'title' => 'company_access',
                        'created_at' => '2022-10-06 14:11:46',
                        'updated_at' => '2022-10-06 14:11:46',
                    ),
                    3 => array(
                        'id' => '26',
                        'title' => 'country_access',
                        'created_at' => '2022-10-06 14:11:46',
                        'updated_at' => '2022-10-06 14:11:46',
                    ),
                    4 => array(
                        'id' => '31',
                        'title' => 'currency_access',
                        'created_at' => '2022-10-06 14:11:46',
                        'updated_at' => '2022-10-06 14:11:46',
                    ),
                    5 => array(
                        'id' => '35',
                        'title' => 'currency_history_access',
                        'created_at' => '2022-10-06 14:11:46',
                        'updated_at' => '2022-10-06 14:11:46',
                    ),
                    6 => array(
                        'id' => '42',
                        'title' => 'general_element_access',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    8 => array(
                        'id' => '68',
                        'title' => 'permission_access',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    9 => array(
                        'id' => '71',
                        'title' => 'permission_edit',
                        'created_at' => '2023-03-14 18:17:58',
                        'updated_at' => '2023-03-14 18:17:58',
                    ),
                    10 => array(
                        'id' => '84',
                        'title' => 'role_access',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    11 => array(
                        'id' => '87',
                        'title' => 'role_edit',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    12 => array(
                        'id' => '106',
                        'title' => 'team_access',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    13 => array(
                        'id' => '109',
                        'title' => 'team_edit',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    14 => array(
                        'id' => '113',
                        'title' => 'user_access',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    15 => array(
                        'id' => '114',
                        'title' => 'user_alert_access',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    16 => array(
                        'id' => '119',
                        'title' => 'user_edit',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    17 => array(
                        'id' => '120',
                        'title' => 'user_management_access',
                        'created_at' => '2022-10-06 14:11:47',
                        'updated_at' => '2022-10-06 14:11:47',
                    ),
                    18 => array(
                        'id' => '632',
                        'title' => 'user_create',
                        'created_at' => '2023-04-17 17:26:32',
                        'updated_at' => '2023-04-17 17:26:32',
                    ),
                    19 => array(
                        'id' => '633',
                        'title' => 'user_delete',
                        'created_at' => '2023-04-17 17:26:42',
                        'updated_at' => '2023-04-17 17:26:42',
                    ),
                    20 => array(
                        'id' => '1',
                        'title' => 'admin_access',
                        'created_at' => '2022-10-06 14:11:46',
                        'updated_at' => '2022-10-06 14:11:46',
                    ),
                ));

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