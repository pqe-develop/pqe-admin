<?php

namespace Pqe\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder {

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
        DB::table('permissions')->delete();

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
    }
}