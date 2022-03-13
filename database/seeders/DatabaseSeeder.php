<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Post::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Gravida quis blandit turpis cursus in hac habitasse. ',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Gravida quis
                blandit turpis cursus in hac habitasse. Tincidunt praesent semper feugiat nibh.
                Commodo viverra maecenas accumsan lacus vel. Vitae auctor eu augue ut. Nibh sed pulvinar
                proin gravida. Vestibulum mattis ullamcorper velit sed ullamcorper. Posuere lorem ipsum
                dolor sit amet consectetur adipiscing. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.',
            'category_id' => 1,
            'user_id' => 1
        ]);
        Post::create([
            'title' => 'Judul Kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Gravida quis blandit turpis cursus in hac habitasse. ',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Gravida quis
                blandit turpis cursus in hac habitasse. Tincidunt praesent semper feugiat nibh.
                Commodo viverra maecenas accumsan lacus vel. Vitae auctor eu augue ut. Nibh sed pulvinar
                proin gravida. Vestibulum mattis ullamcorper velit sed ullamcorper. Posuere lorem ipsum
                dolor sit amet consectetur adipiscing. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.',
            'category_id' => 1,
            'user_id' => 1
        ]);
        Post::create([
            'title' => 'Judul Ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Gravida quis blandit turpis cursus in hac habitasse. ',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Gravida quis
                blandit turpis cursus in hac habitasse. Tincidunt praesent semper feugiat nibh.
                Commodo viverra maecenas accumsan lacus vel. Vitae auctor eu augue ut. Nibh sed pulvinar
                proin gravida. Vestibulum mattis ullamcorper velit sed ullamcorper. Posuere lorem ipsum
                dolor sit amet consectetur adipiscing. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet.',
            'category_id' => 2,
            'user_id' => 1
        ]);

        User::create([
            'name' => 'Elsa Intan',
            'email' => 'elsamartyan27@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('el12345')
        ]);

        User::create([
            'name' => 'Salma Aufa',
            'email' => 'seaid18523@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('salmaaufa12345')
        ]);

        Category::create([
            'name' => 'Kesehatan Hewan',
            'slug' => 'kesehatan-hewan'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

    }
}
