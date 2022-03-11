<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpecialitySylabusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('speciality_sylabus')->delete();
        
        \DB::table('speciality_sylabus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sylabus_name' => 'Tauhid1',
                'sylabus_remark' => NULL,
                'speciality_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'sylabus_name' => 'Tauhid2',
                'sylabus_remark' => NULL,
                'speciality_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'sylabus_name' => 'Fiqih1',
                'sylabus_remark' => NULL,
                'speciality_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'sylabus_name' => 'Fiqih2',
                'sylabus_remark' => NULL,
                'speciality_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'sylabus_name' => 'Fiqih3',
                'sylabus_remark' => NULL,
                'speciality_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}