<?php

use Illuminate\Database\Seeder;

class Portfolio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->delete();
        DB::update("ALTER TABLE works AUTO_INCREMENT = 1;");
        \App\Work::create([
            'title' => 'Cummins',
            'image' => 'Cummins.jpg',
            'work_type' => 'Корпоративная продукция',
            'description' => 'Разработка дизайна и производство различных видов корпоративной продукции. Комплексное рекламное обслуживание бизнеса.',
        ]);
        \App\Work::create([
            'title' => 'Cummins 3D',
            'image' => 'Cummins-3d.jpg',
            'work_type' => 'Печать на 3D-принтере',
            'description' => 'Печать реалистичной детализированной модели двигателя на 3D-принтере.',
        ]);
        \App\Work::create([
            'title' => 'Gazprom',
            'image' => 'Gazprom.jpg',
            'work_type' => 'Корпоративная продукция',
            'description' => 'Разработка дизайна и производство различных видов корпоративной продукции. Комплексное рекламное обслуживание бизнеса.',
        ]);
        \App\Work::create([
            'title' => 'Major',
            'image' => 'Major.jpg',
            'work_type' => 'Фирменный стиль',
            'description' => 'Разработка брендбука и фирменного логотипа компании. Производство корпоративной продукции с логотипом.',
        ]);
        \App\Work::create([
            'title' => 'NKL',
            'image' => 'NKL.jpg',
            'work_type' => 'Фирменный стиль',
            'description' => 'Разработка брендбука и фирменного логотипа компании. Производство корпоративной продукции с логотипом.',
        ]);
        \App\Work::create([
            'title' => 'NovAvto',
            'image' => 'Novavto.jpg',
            'work_type' => 'Фирменный стиль автосалона',
            'description' => 'Разработка брендбука и фирменного логотипа компании. Производство корпоративной продукции с логотипом.',
        ]);
        \App\Work::create([
            'title' => 'Pavlin',
            'image' => 'Pavlin.jpg',
            'work_type' => 'Фирменный стиль ресторана',
            'description' => 'Разработка брендбука и фирменного логотипа компании. Производство корпоративной продукции с логотипом.',
        ]);
        \App\Work::create([
            'title' => 'Prowaterpolo',
            'image' => 'Prowaterpolo.jpg',
            'work_type' => 'Фирменный стиль детской школы',
            'description' => 'Разработка брендбука и фирменного логотипа компании. Производство корпоративной продукции с логотипом.',
        ]);
        \App\Work::create([
            'title' => 'Rambler',
            'image' => 'Rambler.jpg',
            'work_type' => 'Арт-объект',
            'description' => 'Разработка креативных концепций уличного арт-объекта для компании Rambler.',
        ]);
        \App\Work::create([
            'title' => 'Sibilev',
            'image' => 'Sibilev.jpg',
            'work_type' => 'Логотип fashion-фотографа',
            'description' => 'Разработка логотипа для fashion -фотографа.',
        ]);
        \App\Work::create([
            'title' => 'Stroibis',
            'image' => 'Stroibis.jpg',
            'work_type' => 'Фирменный стиль',
            'description' => 'Разработка брендбука и фирменного логотипа компании. Производство корпоративной продукции с логотипом.',
        ]);
        \App\Work::create([
            'title' => 'Tabletka',
            'image' => 'Tabletka.jpg',
            'work_type' => 'Фирменный стиль аптеки',
            'description' => 'Разработка брендбука и фирменного логотипа компании. Производство корпоративной продукции с логотипом.',
        ]);
        \App\Work::create([
            'title' => 'Tinkoff',
            'image' => 'Tinkoff.jpg',
            'work_type' => 'Веб-сайт',
            'description' => 'Разработка дизайна посадочной страницы.',
        ]);
        \App\Work::create([
            'title' => 'Waterpoloteam',
            'image' => 'Waterpoloteam.jpg',
            'work_type' => 'Фирменный стиль спортивной команды',
            'description' => 'Разработка брендбука и фирменного логотипа компании. Производство корпоративной продукции с логотипом.',
        ]);
    }
}
