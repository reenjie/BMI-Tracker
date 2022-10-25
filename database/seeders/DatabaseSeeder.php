<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\ranges;

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
            'birthday' => now(),
            'gender' => '',
            'role' => 1,
            'isverified' => 0,
            'bmi'=>0,
            'password' => Hash::make('password')
        ]);

        ranges::create([
        'start' =>19,
        'end' =>24,
        'conclusion'=>'Normal',
        ]);

        ranges::create([
       'start' =>25,
        'end' =>29,
       'conclusion'=>'OverWeight',
        ]);
        ranges::create([
        'start' =>15,
         'end' =>18,
         'conclusion'=>'UnderWeight',
         ]);
         ranges::create([
         'start' =>30,
          'end' =>70,
          'conclusion'=>'Obese',
          ]);
    }
}
