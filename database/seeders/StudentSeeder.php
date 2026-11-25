<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert(
        [
            [
            'name' => 'Ali',
            'phone' => '09879665'
            ],
            [
            'name' => 'Amran',
            'phone' => '0987909'
            ],
            [
            'name' => 'Bashar',
            'phone' => '09879665'
            ],
            [
            'name' => 'Sara',
            'phone' => '09879665'
            ]
        ]
        );
    }
}
