<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Otis Conroy IV',
                'email' => 'masjid@example.com',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '6KC8mAAmTC',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Golden Bergstrom I',
                'email' => 'ustadz@example.org',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'LhOhAYWSxV',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Carolyne Halvorson I',
                'email' => 'masjid2@example.com',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'fIZzHNBBan',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Savannah Medhurst',
                'email' => 'ustadz2@example.com',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'Sdlcy4RbiA',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Juliet Cruickshank',
                'email' => 'fadel.oceane@example.com',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'wCY5wd9yHU',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Therese Moore',
                'email' => 'jocelyn.harvey@example.org',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'FYzCMrLvdJ',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Kaylin Orn',
                'email' => 'terry.bella@example.com',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'ObMtNDyLT8',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ewald Cruickshank II',
                'email' => 'simonis.sheridan@example.org',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'okNs3Aj5Cu',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Mitchell Moen',
                'email' => 'jovan85@example.net',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'lKlD0WZy8C',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Anabel Kemmer',
                'email' => 'kub.madilyn@example.net',
                'email_verified_at' => '2022-02-22 08:10:14',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'c08v0wupc1',
                'created_at' => '2022-02-22 08:10:14',
                'updated_at' => '2022-02-22 08:10:14',
            ),
        ));
        
        
    }
}