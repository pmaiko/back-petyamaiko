<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            'label' => 'test',
            'description' => 'test',
            'path' => '/',
            'user_id' => 1,
            'created_at' => Date::now()->toDateTimeString()
        ]);
    }
}
