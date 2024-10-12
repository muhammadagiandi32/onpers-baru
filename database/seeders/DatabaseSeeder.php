<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\News;
use Faker\Factory as Faker;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')
        ->update(['role' => "admin"]);
            // Category::create([
            //     'id' => Str::uuid(),
            //     'name' => 'Advertorial',
            // ]);
        // \App\Models\User::factory(10)->create();

        User::create([
            'uuid' => Str::uuid(),
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'role'=>'wartawan',
            'email_verified_at' => now(),
            'media'=>'neraca',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
          // \App\Models\User::factory(10)->create();

        User::create([
            'uuid' => Str::uuid(),
            'name' => 'Muhammad Agiandi',
            'email' => 'agi@gmail.com',
            'role'=>'wartawan',
            'email_verified_at' => now(),
            'media'=>'neraca',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // $faker = Faker::create();
        // $user = User::all()->random();
        // // Generate dummy data for authors


        // // Generate dummy data for categories
        // $categories = ['Berita', 'Acara', 'Rilis'];
        // foreach ($categories as $category) {
        //     Category::create([
        //         'id' => Str::uuid(),
        //         'name' => $category,
        //     ]);
        // }

        // $title = $faker->sentence;
        // // Generate dummy data for news articles
        // for ($i = 0; $i < 20; $i++) {
        //     News::create([
        //         'id' => Str::uuid(),
        //         'title' => $title,
        //         'slug' => Str::slug($title),
        //         'content' => $faker->paragraph(5),
        //         'image_name' => '7680d199-026f-46dc-8ba0-273410231f1f.png',
        //         'image_url' => $faker->imageUrl(),
        //         'author_id' => User::all()->random()->uuid,
        //         'category_id' => Category::all()->random()->id,
        //         'published_at' => $faker->dateTime(),
        //     ]);
        // }
    }
}
