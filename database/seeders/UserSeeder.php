<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Yourname',
            'middle_name' => 'Middlename',
            'last_name' => 'Lastname',
            'gender' => 'Male',
            'birthdate' => '2021-09-09',
            'brgy' => 'Brgy',
            'street' => 'Street',
            'purok' => 'Purok',
            'email' => 'example_user@gmail.com',
            'password' => Hash::make('q1w2e3r4t5y6'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
