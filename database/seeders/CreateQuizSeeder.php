<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizzes')->insert(
            array(
            array(
                'published' => 1,
                'label' => 'Quizz 1',
            ),
            array(
                'published' => 1,
                'label' => 'Quizz 2',
            ),
            array(
                'published' => 0,
                'label' => 'Quizz 3',
            ),
            )
        );
           
    }
}
