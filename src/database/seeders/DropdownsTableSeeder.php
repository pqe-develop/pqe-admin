<?php

namespace Pqe\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DropdownsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        //         DB::table('dropdowns')->delete();
        DB::table('dropdowns')->insert(
                array(
                    0 => array(
                        'id' => '1',
                        'dropdown' => 'STATUS_SELECT',
                        'name' => 'Active',
                        'label' => 'Active',
                        'disactivated' => 0,
                        'prog' => 1,
                    ),
                    1 => array(
                        'id' => '2',
                        'dropdown' => 'STATUS_SELECT',
                        'name' => 'Inactive',
                        'label' => 'Inactive',
                        'disactivated' => 0,
                        'prog' => 2,
                    ),
                ));
    }
}