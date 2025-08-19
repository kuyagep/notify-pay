<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banks = [
            'Land Bank of the Philippines',
            'BDO Unibank',
            'Metrobank',
            'BPI',
            'UnionBank',
        ];

        foreach ($banks as $name) {
            Bank::firstOrCreate(['name' => $name]);
        }
    }
}
