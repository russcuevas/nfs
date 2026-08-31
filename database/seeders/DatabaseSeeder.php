<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Seeder
        User::updateOrCreate(
            ['email' => 'nfs@gmail.com'],
            [
                'name' => 'National Food Showdown Admin',
                'password' => Hash::make('123456789'),
            ]
        );
    }
}
