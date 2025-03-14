<?php

namespace Database\Seeders;

use App\Models\Article;
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
                'start_date'           => '2025-01-22',
                'end_date'             => '2025-02-30',
                'contributor_username' => 'foodlover@example.com'
            ],
            [
                'title'                => 'Exploring Asian Street Food',
                'body'                 => '<p>Asian street food is celebrated for its diverse flavors and vibrant offerings—from spicy noodles to savory dumplings. Discover hidden gems in bustling night markets.</p>',
                'create_date'          => '2025-03-15',
                'start_date'           => '2025-03-01',
                'end_date'             => '2025-03-08',
                'contributor_username' => 'streetfoodie@example.com'
            ],
            [
                'title'                => 'A Taste of the Mediterranean',
                'body'                 => '<p>Mediterranean cuisine brings fresh vegetables, grilled fish, and olive oil together for a heart-healthy experience. Dive into traditional recipes from Greece and Spain.</p>',
                'create_date'          => '2025-03-15',
                'start_date'           => '2025-03-03',
                'end_date'             => '2025-03-29',
                'contributor_username' => 'mediterraneanchef@example.com'
            ],
            [
                'title'                => 'Decadent Desserts from France',
                'body'                 => '<p>French pastries are renowned for their rich flavors and delicate textures. From macarons to crème brûlée, indulge your sweet tooth with these classic desserts.</p>',
                'create_date'          => '2025-03-15',
                'start_date'           => '2025-03-13',
                'end_date'             => '2025-03-27',
                'contributor_username' => 'frenchbaker@example.com'
            ],
            [
                'title'                => 'The Spices of India',
                'body'                 => '<p>Indian cuisine is a vibrant tapestry of spices and herbs. Experience a burst of flavor with curries, tandoori dishes, and aromatic rice preparations.</p>',
                'create_date'          => '2025-03-16',
                'start_date'           => '2025-05-21',
                'end_date'             => '2025-06-30',
                'contributor_username' => 'spiceguru@example.com'
            ],
        ]);
    }
}
