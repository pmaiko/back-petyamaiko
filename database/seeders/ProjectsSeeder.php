<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'image' => 'https://images.unsplash.com/photo-1663811397236-731fb210c817',
            'label' => 'Артемовский Завод Шампанских Вин - Artwinery',
            'description' => 'Завод шампанских вин Бахмут ⭐ Официальный сайт ⭐ Выдержанное игристое на подарок ⭐ Шампанское на праздничный стол ⭐ Шампанское на Новый Год ⭐ Игристое на праздник ➱ Artwinery',
            'likes' => 1,
            'views' => 1,
            'created_at' => Date::now()->toDateTimeString()
        ]);

        DB::table('projects')->insert([
            'image' => 'https://images.unsplash.com/photo-1663837863005-cf0d6a069d1b',
            'label' => 'NOVUS.ONLINE Дбайлива доставка свіжих продуктів у зручний час',
            'description' => 'Наша мета Повернути вам час для себе! Якісно доставляти товари, свіжі продукти, щоб ви мали більше часу на себе та близьких.',
            'likes' => 2,
            'views' => 1,
            'created_at' => Date::now()->toDateTimeString()
        ]);
    }
}
