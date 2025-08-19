<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            'Administrative Assistant',
            'HR Officer',
            'IT Specialist',
            'Cashier',
            'Manager',
        ];

        foreach ($positions as $title) {
            Position::firstOrCreate(['title' => $title]);
        }
    }
}
