<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class SectionMainBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('section_main_banner')->insert([
        'image' => 'https://images.unsplash.com/photo-1663811397236-731fb210c817',
        'title' => 'FRONT-END DEVELOPER PETYA MAIKO',
        'description' => 'BUILDING THE BEST WEBSITES IN THE WORLD!!!',
        'button_label' => 'SEND REQUEST',
        'hint' => 'HI!!!',
        'page_id' => 1,
        'created_at' => Date::now()->toDateTimeString()
      ]);
    }
}
