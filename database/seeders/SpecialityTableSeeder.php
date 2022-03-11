<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpecialityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('speciality')->delete();
        
        \DB::table('speciality')->insert(array (
            0 => 
            array (
                'id' => 1,
                'speciality' => 'Tauhid',
                'part_of_speciality' => NULL,
                'insert_by' => NULL,
                'created_at' => NULL,
                'update_by' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'speciality' => 'Fiqih',
                'part_of_speciality' => NULL,
                'insert_by' => NULL,
                'created_at' => NULL,
                'update_by' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}