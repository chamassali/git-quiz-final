<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert(
            array(
                array(
                    'quiz_id' => 1,
                    'label' => 'Quelle est le meilleur framework backend ?',
                    'answer' => 2,
                    'earnings' => 1,
                ),
                array(
                    'quiz_id' => 1,
                    'label' => 'Quel est la capitale de la Turquie',
                    'answer' => 2,
                    'earnings' => 1,
                ),
            )
            
        );
           
    }
}
