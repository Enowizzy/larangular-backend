<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'first_name'     => 'Jeedie',
            'last_name'     => 'Jide',
            'user_type'     => 1,
            'email'    => 'jeedie@test.com', 
            'password' => Hash::make('password'),
        ]);
    }
}
