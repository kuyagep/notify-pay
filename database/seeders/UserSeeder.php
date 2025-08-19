<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('password'), // ⚠️ Change in production
            ]
        );
        $user = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'System User',
                'password' => Hash::make('password'), // ⚠️ Change in production
            ]
        );

        // Assign role to admin (make sure roles are seeded first)
        if (! $admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }
        if (! $user->hasRole('user')) {
            $user->assignRole('user');
        }
    }
}
