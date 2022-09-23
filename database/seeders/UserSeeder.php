<?php

namespace Database\Seeders;

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
            'name' => 'Petya',
            'email' => 'petyamaiko@gmail.com',
            'password' => Hash::make('secret')
        ]);

        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'test@test.test',
            'password' => Hash::make('secret')
        ]);
    }
}
