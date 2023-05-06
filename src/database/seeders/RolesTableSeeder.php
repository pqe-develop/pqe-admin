<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => '14',
                'title' => 'Operator',
                'created_at' => '2022-08-03 15:51:31',
                'updated_at' => '2023-04-17 17:28:20',
            ),
            1 => 
            array (
                'id' => '16',
                'title' => 'Admin',
                'created_at' => '2022-08-05 14:50:13',
                'updated_at' => '2023-04-17 17:24:33',
            ),
        ));
        
        
    }
}