<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
            array(
                'name' => 'Mr.Bourebaba',
                'email' => 'test@gmail.com',
                'password'=> '$2y$10$7tu/nl/YxFMC00Ir5bMhpeLcG3462hjMLzKisGpTuICMIE4iXBzu.'
            ),
            )
        );
    }
}
