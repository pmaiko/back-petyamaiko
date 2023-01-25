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
        'image' => '/storage/1DI7LrqM-lGMyJXhmj1U-YiOiu2Q3IsUJ',
        'label' => 'Артемівський Завод Шампанських Вин | Artwinery',
        'description' => 'Завод шампанских вин Бахмут ⭐ Офіційний сайт ⭐ Витримане ігристе на подарунок ⭐ Шампанське на святковий стіл ⭐ Шампанське на Новий Рік ⭐ Ігристе на свято ➱ Artwinery',
        'url' => 'https://artwinery.com.ua/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('projects')->insert([
        'image' => '/storage/1_MDEO27hukIJpuCc9N2JnoYiUE0HPX2r',
        'label' => 'Лексус Сіті Плаза',
        'description' => 'Автомобілі Lexus ➥ Модельний ряд ✅ Технічні характеристики ✅ Комплектації і ціни ✅ Дізнайся більше інформації на сайті офіційного дилера Lexus',
        'url' => 'https://cityplaza.lexus.ua/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('projects')->insert([
        'image' => '/storage/1AOuQCn0XiBB-yQgwQZrldiqoBDV63uvs',
        'label' => 'Ощадбанк',
        'description' => 'Звісно, Ощад — це проста відповідь на будь-яке фінансове питання',
        'url' => 'https://www.oschadbank.ua/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('projects')->insert([
        'image' => '/storage/1BhQNl_v6bx6fNdnqIB6ZZwcmI1cGLXQS',
        'label' => 'Sapiens',
        'description' => 'Sapiens is a global impact community, hub and investment vehicle',
        'url' => 'https://sapiensimpact.com/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('projects')->insert([
        'image' => '/storage/1F8-o95hwJ3Sal7LjpjNbRNOAOVyh8zcm',
        'label' => 'Sense Bank',
        'description' => 'Великий український банк з міжнародним капіталом. Кращі ставки по кредитам, депозитам, грошовим переказам від Sense Bank.',
        'url' => 'https://sensebank.com.ua/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('projects')->insert([
        'image' => '/storage/1lYc4trIQdZNF7WC1eipql62yGXV2h-t8',
        'label' => 'ГАЗЗБУТ',
        'description' => 'Постачальники газу в Україні  ✅ Якісний газ від перевірених постачальників ✅ Низькі тарифи на газ від Gaszbut',
        'url' => 'https://gaszbut.com.ua/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('projects')->insert([
        'image' => '/storage/1_vaxVQoOUWrReSdQPcOFV2EN_Oumb9uR',
        'label' => 'Йе-энергия',
        'description' => 'Сучасний партнер у постачанні газу та електроенергії',
        'url' => 'https://je.com.ua/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('projects')->insert([
        'image' => '/storage/1uP_jKHpOfTNdxu5_DUylA-usyA08Mit0',
        'label' => 'Дія.Бізнес',
        'description' => 'Цей сайт для майбутніх та досвідчених підприємців - 1 stop shop з відповідями на усі питання',
        'url' => 'https://business.diia.gov.ua/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      DB::table('projects')->insert([
        'image' => '/storage/1EgAY1LGvhF_nszQNKaLSHF-mPrnl_R06',
        'label' => 'Novus.Online ᐈ Ваш інтернет-супермаркет в Києві',
        'description' => 'Купуй все, що потрібно, з доставкою від Novus.Online ⏩ Без мінімальної суми замовлення ⚡️ Працюємо 7 днів на тиждень з 11:00 до 22:00!',
        'url' => 'https://novus.online/',
        'likes' => null,
        'views' => null,
        'created_at' => Date::now()->toDateTimeString()
      ]);

      // https://images.unsplash.com/photo-1663811397236-731fb210c817
      // https://images.unsplash.com/photo-1663837863005-cf0d6a069d1b
    }
}
