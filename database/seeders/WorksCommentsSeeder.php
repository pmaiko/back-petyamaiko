<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class WorksCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works_comments')->insert([
            'comment' => 'Класс!!!',
            'work_id' => 1,
            'created_at' => Date::now()->toDateTimeString()
        ]);
    }
}
