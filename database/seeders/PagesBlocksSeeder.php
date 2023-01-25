<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PagesBlocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('pages_blocks')->insert([
        'page_id' => 1,
        'name' => 'block_main_banner',
        'position' => 0,
        'data' => '{"hint": "HI!!!", "image": "/storage/1mASNnijfJiT1T52jpE-_4rWbRTsMKaD1", "title": "Front-End Developer <br /> Petya Maiko", "description": "Building the best websites in the world!!!", "button_label": "SEND REQUEST"}',
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('pages_blocks')->insert([
        'page_id' => 1,
        'name' => 'block_services',
        'position' => 1,
        'data' => '{"list": [{"image": "/storage/1c8OR5XBrMQoyqA8BLEJJ2rBbcga_5aBI", "label": "UI/UX Design", "description": "We provide high-quality design for websites. It\'s important to have unique and attractive designs so that your audience sticks around with the site."}, {"image": "/storage/1Ypq-G5j0MzVO2MKZPJjaeFG46wyZ0N0F", "label": "Web Design", "description": "We create websites that will bring value to your business. Here you can expect your dream website to built."}, {"image": "/storage/125tgFHn8EqJFvy2zQoXWTJyo9tD5pP5j", "label": "Web Dev", "description": "Armed with the newest technology, our front and back-end development teams bring your designs to life. We develop for the now and build for the longer term."}], "title": "Services"}',
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('pages_blocks')->insert([
        'page_id' => 1,
        'name' => 'block_projects',
        'position' => 2,
        'data' => '{"title": "Recent Projects"}',
        'created_at' => Date::now()->toDateTimeString()
      ]);
    }
}
