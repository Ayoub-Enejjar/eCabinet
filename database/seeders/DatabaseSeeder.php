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
        User::create([
            'name' => 'Admin Test',
            'email' => 'admin@ecabinet.com',
            'password' => bcrypt('password'),
            'role' => 'ADMIN',
        ]);

        User::create([
            'name' => 'Doctor Test',
            'email' => 'doctor@ecabinet.com',
            'password' => bcrypt('password'),
            'role' => 'DOCTOR',
        ]);

        User::create([
            'name' => 'Patient Test',
            'email' => 'patient@ecabinet.com',
            'password' => bcrypt('password'),
            'role' => 'PATIENT',
        ]);
    }
}
