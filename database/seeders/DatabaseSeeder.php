<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ecabinet.com'],
            [
                'name' => 'Admin Test',
                'password' => bcrypt('password'),
                'role' => 'ADMIN',
            ]
        );

        User::updateOrCreate(
            ['email' => 'doctor@ecabinet.com'],
            [
                'name' => 'Doctor Test',
                'password' => bcrypt('password'),
                'role' => 'DOCTOR',
            ]
        );

        User::updateOrCreate(
            ['email' => 'patient@ecabinet.com'],
            [
                'name' => 'Patient Test',
                'password' => bcrypt('password'),
                'role' => 'PATIENT',
            ]
        );
    }
}
