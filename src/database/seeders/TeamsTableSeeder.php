<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'HR-ITALY',
                'created_at' => '2020-12-28 17:49:45',
                'updated_at' => '2020-12-28 17:49:45',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'HR-SPAIN',
                'created_at' => '2020-12-28 17:49:46',
                'updated_at' => '2020-12-28 17:49:46',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'HR-ECUADOR',
                'created_at' => '2020-12-28 17:49:46',
                'updated_at' => '2020-12-28 17:49:46',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'HR-SUISSE',
                'created_at' => '2020-12-28 17:49:46',
                'updated_at' => '2020-12-28 17:49:46',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'HR-ISRAEL',
                'created_at' => '2020-12-28 17:49:46',
                'updated_at' => '2020-12-28 17:49:46',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'HR-CHINA',
                'created_at' => '2020-12-28 17:49:46',
                'updated_at' => '2020-12-28 17:49:46',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'HR-US',
                'created_at' => '2020-12-28 17:49:47',
                'updated_at' => '2020-12-28 17:49:47',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'HR-DOTS',
                'created_at' => '2020-12-28 17:49:47',
                'updated_at' => '2020-12-28 17:49:47',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'HR-DEUTSCHLAND',
                'created_at' => '2020-12-28 17:49:47',
                'updated_at' => '2020-12-28 17:49:47',
            ),
            9 => 
            array (
                'id' => '10',
                'name' => 'HR-MEXICO',
                'created_at' => '2020-12-28 17:49:47',
                'updated_at' => '2020-12-28 17:49:47',
            ),
            10 => 
            array (
                'id' => '11',
                'name' => 'HR-BRAZIL',
                'created_at' => '2020-12-28 17:49:48',
                'updated_at' => '2020-12-28 17:49:48',
            ),
            11 => 
            array (
                'id' => '12',
                'name' => 'HR-JAPAN',
                'created_at' => '2020-12-28 17:49:48',
                'updated_at' => '2020-12-28 17:49:48',
            ),
            12 => 
            array (
                'id' => '13',
                'name' => 'HR-RUSSIA',
                'created_at' => '2020-12-28 17:49:48',
                'updated_at' => '2020-12-28 17:49:48',
            ),
            13 => 
            array (
                'id' => '14',
                'name' => 'HR-INDIA',
                'created_at' => '2020-12-28 17:49:48',
                'updated_at' => '2020-12-28 17:49:48',
            ),
            14 => 
            array (
                'id' => '15',
                'name' => 'HR-POLAND',
                'created_at' => '2020-12-28 17:49:48',
                'updated_at' => '2020-12-28 17:49:48',
            ),
            15 => 
            array (
                'id' => '16',
                'name' => 'HR-BELGIUM',
                'created_at' => '2020-12-28 17:49:48',
                'updated_at' => '2020-12-28 17:49:48',
            ),
            16 => 
            array (
                'id' => '19',
                'name' => 'HR-UK',
                'created_at' => '2021-04-20 10:02:10',
                'updated_at' => '2021-04-20 10:02:10',
            ),
            17 => 
            array (
                'id' => '22',
                'name' => 'HR-FRANCE',
                'created_at' => '2021-04-20 10:02:19',
                'updated_at' => '2021-04-20 10:02:19',
            ),
            18 => 
            array (
                'id' => '25',
                'name' => 'HR-AU',
                'created_at' => '2022-05-12 11:33:00',
                'updated_at' => '2022-05-12 11:33:00',
            ),
            19 => 
            array (
                'id' => '26',
                'name' => 'HR-MALTA',
                'created_at' => '2022-08-03 11:04:00',
                'updated_at' => '2022-08-03 11:04:00',
            ),
            20 => 
            array (
                'id' => '27',
                'name' => 'HR-GQC',
                'created_at' => '2022-08-03 13:04:12',
                'updated_at' => '2022-08-03 13:04:12',
            ),
            21 => 
            array (
                'id' => '28',
                'name' => 'HR-ARGENTINA',
                'created_at' => '2022-08-23 18:36:42',
                'updated_at' => '2022-08-23 18:36:42',
            ),
        ));
        
        
    }
}