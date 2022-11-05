<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PagesSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('pages_sections')->insert([
        'page_id' => '1',
        'section_id' => '1',
        'section_name' => 'section_main_banner',
        'created_at' => Date::now()->toDateTimeString()
      ]);
    }
}
