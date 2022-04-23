<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class OvertimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('overtimes')->insert([
            'employee_id' => 1,
            'date' => '2022-05-03',
            'time_started' => '15:00', 
            'time_ended' => '18:00',
        ]);
    }
}
