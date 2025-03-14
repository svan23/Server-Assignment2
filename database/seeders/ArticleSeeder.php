<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::insert([
            [
                'title'                => 'The Flavors of Italy',
                'body'                 => '<p>Italian cuisine offers a unique blend of fresh ingredients such as tomatoes, olive oil, and basil. Enjoy handmade pasta and classic wood-fired pizzas.</p>',
                'create_date'          => '2025-03-14',
                'start_date'           => '2025-03-22',
                'end_date'             => '2025-03-30',
                'contributor_username' => 'foodlover@example.com'
            ],
            [
                'title'                => 'Exploring Asian Street Food',
                'body'                 => '<p>Asian street food is celebrated for its diverse flavors and vibrant offerings—from spicy noodles to savory dumplings. Discover hidden gems in bustling night markets.</p>',
                'create_date'          => '2025-03-14',
                'start_date'           => '2025-03-16',
                'end_date'             => '2025-03-31',
                'contributor_username' => 'streetfoodie@example.com'
            ],

        ]);
    }
}
