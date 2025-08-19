<?php

namespace Database\Seeders;

use App\Models\BenefitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BenefitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Salary Differential',
            'Allowance',
            'Bonus',
            'Hazard Pay',
            'Clothing Allowance',
            'Mid-Year Bonus',
            'Year-End Bonus',
        ];

        foreach ($types as $type) {
            BenefitType::firstOrCreate(['name' => $type]);
        }
    }
}
