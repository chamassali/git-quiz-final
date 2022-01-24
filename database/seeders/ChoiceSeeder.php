<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choices')->insert(
            array(
            array(
                'question_id' => 1,
                'label' => 'Laravel',
            ),
            array(
                'question_id' => 1,
                'label' => 'Symfony',
            ),
            array(
                'question_id' => 1,
                'label' => 'CodeIgniter',
            ),
            array(
                'question_id' => 2,
                'label' => 'Istanbul',
            ),
            array(
                'question_id' => 2,
                'label' => 'Ankara',
            ),
            array(
                'question_id' => 2,
                'label' => 'Marmaris',
            ),
            )
        );
    }
}
