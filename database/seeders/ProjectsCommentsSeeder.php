<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProjectsCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects_comments')->insert([
            'name' => 'Zhenya',
            'comment' => 'Класс!!!',
            'project_id' => 1,
            'created_at' => Date::now()->toDateTimeString()
        ]);
        DB::table('projects_comments')->insert([
            'name' => 'Petya',
            'comment' => 'Супер!!!',
            'project_id' => 1,
            'created_at' => Date::now()->toDateTimeString()
        ]);
    }
}
