<?php

namespace Database\Seeders;

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
        DB::table('users')->insert(['name' => 'Pablo Buan', 'email' => 'pebz@admin.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Angelo Pogi', 'email' => 'angelo@admin.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Eben Pogi', 'email' => 'eben@gmail.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Garrell Pogi', 'email' => 'garrell@gmail.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Jacob Maganda', 'email' => 'jacob@gmail.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Japeth Pogi', 'email' => 'japeth@gmail.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Elisha Pogi', 'email' => 'elisha@gmail.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Kayla Acosta', 'email' => 'kayla@gmail.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Steffanie Egloso', 'email' => 'steffanie@admin.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Denise Chavez', 'email' => 'denise@admin.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Jannah Dela Rosa', 'email' => 'jannah@admin.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Azhelle Casimiro', 'email' => 'azhelle@admin.com', 'password' => Hash::make('password')]);
        DB::table('users')->insert(['name' => 'Rieza Espejo', 'email' => 'rieza@admin.com', 'password' => Hash::make('password')]);
    }
}
