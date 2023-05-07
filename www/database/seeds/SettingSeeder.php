<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'max' => 20,
            'min' => 1,
            'numberOfQuestion' => 20,
            'percentageForPass' => 80,
            'factor' => 2,
            'rewardRate' => 80,
            'timeLimitaion' => 300,
            'stars' => 0,
            'addition' => true,
            'subtraction' => true,
            'multiplication' => true,
            'division' => true,
        ]);
    }
}
