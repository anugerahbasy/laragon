<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    DB::table('periods')->insert([
        ['name' => 'Semester 1', 'semester_number' => 1, 'start_date' => '2025-01-01', 'end_date' => '2025-06-30'],
        ['name' => 'Semester 2', 'semester_number' => 2, 'start_date' => '2025-07-01', 'end_date' => '2025-12-31'],
        ['name' => 'Semester 3', 'semester_number' => 3, 'start_date' => '2026-01-01', 'end_date' => '2026-06-30'],
    ]);
}

}
