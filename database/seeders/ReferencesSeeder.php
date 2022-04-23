<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('references')->insert([
            'code' => 'overtime_method',
            'name' => 'Salary / 173',
            'expression' => '(salary / 173) * overtime_duration_total'
        ]);
        DB::table('references')->insert([
            'code' => 'overtime_method',
            'name' => 'Fixed',
            'expression' => '10000 * overtime_duration_total'
        ]);
        DB::table('references')->insert([
            'code' => 'employee_status',
            'name' => 'Tetap',
        ]);
        DB::table('references')->insert([
            'code' => 'employee_status',
            'name' => 'Percobaan',
        ]);
    }
}
