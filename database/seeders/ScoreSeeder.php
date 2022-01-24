<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scores')->insert(
            array(
            array(
                'quiz_id' => 1,
                'user_id' => 1,
                'score' => 1,
            ),
            array(
                'quiz_id' => 2,
                'user_id' => 1,
                'score' => 0,
            ),
            )
        );
    }
}
