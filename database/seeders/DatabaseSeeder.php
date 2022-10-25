<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'age' => '',
            'gender' => '',
            'role' => 1,
            'isverified' => 0,
            'password' => Hash::make('password')
        ]);
    }
}
