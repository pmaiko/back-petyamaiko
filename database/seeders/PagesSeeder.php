<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('pages')->insert([
        'title' => 'PETYA MAIKO',
        'description' => 'SITE',
        'alias' => 'home',
        'created_at' => Date::now()->toDateTimeString()
      ]);
    }
}
