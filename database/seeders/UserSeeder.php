<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "SUPER",
            'email' => 'super@gmail.com',
            'phone' => '01234567890',
            'gender' => 'Male',
            'address' => 'Dhaka',
            'role' => '1',
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
        ]);
    }
}
