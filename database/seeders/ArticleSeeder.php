<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Article::factory(10)->create();
        $faker = Faker::create();

        $categories = ['Ville', 'Campagne', 'Urbain', 'Loft', 'Perle', 'Astuces'];

        Article::factory()->create([
            'title' => $faker->sentence(),
            'content' => $faker->paragraphs(rand(1,7), true),
            'category' => $faker->randomElement($categories),
            'image_url' => 'https://unsplash.com/photos/' . implode('-', $faker->words(5)),
            'created_at' => now(),
        ]);
    }
}
