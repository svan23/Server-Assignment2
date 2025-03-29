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
                'body' => '<p>Tiramisu, a beloved Italian dessert, offers a delightful combination of rich and creamy layers. Traditionally made with layers of coffee-soaked ladyfingers and mascarpone cheese, tiramisu is the epitome of indulgence. The coffee brings a deep, bittersweet flavor that complements the creamy mascarpone mixture, creating a balanced taste experience. A dusting of cocoa powder on top adds a touch of bitterness, while the subtle flavor of coffee lingers in each bite. Whether served in individual portions or in a large dish, tiramisu has a timeless appeal that makes it a favorite at any gathering. The beauty of tiramisu lies in its versatility—though the classic recipe remains a favorite, it can be customized with different variations, such as adding chocolate shavings, berries, or even liqueurs like Amaretto for an extra depth of flavor. Tiramisu is a perfect ending to any meal, with its perfect blend of sweetness, creaminess, and a hint of coffee, leaving everyone craving just one more bite.</p>',
                'create_date'          => '2025-03-14',
                'start_date'           => '2025-01-22',
                'end_date'             => '2025-05-30',
                'contributor_username' => 'vanessa@bcit.ca'
            ],
            [
                'title'                => 'Irresistible Chocolate Desserts',
                'body' => '<p>Chocolate desserts hold a special place in the hearts of sweet lovers everywhere. From decadent chocolate lava cakes, where molten chocolate pours from the center, to airy mousse that melts on your tongue, chocolate offers countless indulgences. Chocolate brownies, rich and fudgy, provide a comforting experience, often paired with a scoop of creamy vanilla ice cream. French chocolate éclairs are delightful pastries filled with velvety chocolate cream and topped with a glossy chocolate glaze. Chocolate cakes, both simple and elaborate, grace celebrations worldwide, becoming centerpieces at birthdays and weddings. Dark chocolate desserts, such as tarts or truffles, offer a sophisticated depth of flavor, combining bitterness and sweetness harmoniously. Milk chocolate, softer and sweeter, makes delicate mousses and creamy puddings irresistible. Chocolate pairs wonderfully with fruits like strawberries, raspberries, and bananas, enhancing its natural sweetness. The versatility of chocolate also invites creative combinations, including chili, sea salt, and caramel, each adding unique dimensions to traditional recipes. Whether enjoyed as comfort food or a gourmet treat, chocolate desserts continue to captivate taste buds, offering timeless pleasure.</p>',
                'create_date'          => '2025-03-15',
                'start_date'           => '2025-03-01',
                'end_date'             => '2025-05-08',
                'contributor_username' => 'dina@bcit.ca'
            ],
            [
                'title'                => 'Classic French Bakery Delights',
                'body'                 => '<p>Mediterranean cuisine brings fresh vegetables, grilled fish, and olive oil together for a heart-healthy experience. Dive into traditional recipes from Greece and Spain.</p>',
                'create_date'          => '2025-03-15',
                'start_date'           => '2025-03-03',
                'end_date'             => '2025-05-29',
                'contributor_username' => 'james@bcit.ca'
            ],
            [
                'title'                => 'Decadent Desserts from France',
                'body' => '<p>French bakeries are celebrated for their exquisite pastries and breads, showcasing mastery in baking techniques. Croissants, buttery and flaky, symbolize the essence of French culinary art. Pain au chocolat, croissants filled with chocolate, elevate mornings with their decadent taste. Macarons, delicate almond-based treats, delight with vibrant colors and varied fillings from raspberry to pistachio. Traditional baguettes, golden and crisp, provide the ideal base for sandwiches or a simple spread of butter and jam. French bakeries also offer delicate madeleines, petite cakes shaped like seashells, capturing hearts with their subtle sweetness and spongy texture. Tarts adorned with fresh fruits or silky custard embody sophistication, while éclairs, filled with creamy custard or chocolate ganache, complete the bakery experience. French baking combines precision and artistry, balancing flavors and textures to perfection. Techniques passed down through generations emphasize quality ingredients and meticulous attention to detail, resulting in pastries that are both visually stunning and delicious. Visiting a French bakery is an immersive experience, transporting customers to charming Parisian cafes and the rich tradition of French patisserie.</p>',
                'create_date'          => '2025-03-15',
                'start_date'           => '2025-03-13',
                'end_date'             => '2025-05-27',
                'contributor_username' => 'vanessa@bcit.ca'
            ],
            [
                'title'                => 'Spanish Flan: A Creamy Delight',
                'body'                 => '<p>Spanish flan, also known as leche flan, is a beloved dessert that has become a staple in Spanish-speaking countries around the world. This smooth, creamy custard is typically made with simple ingredients: eggs, milk, sugar, and vanilla. The result is a rich, velvety texture that melts in your mouth with each spoonful. Spanish flan is often topped with a luscious caramel sauce, which adds a perfect balance of sweetness and slight bitterness to the dish.</p>',
                'create_date'          => '2025-03-16',
                'start_date'           => '2025-03-21',
                'end_date'             => '2025-06-30',
                'contributor_username' => 'dina@bcit.ca'
            ],
            [
                'title'                => 'Heavenly Desserts Beyond May',
                'body'                 => '<p>Satisfy your sweet tooth with a collection of dessert recipes that will delight you long after May. Indulge in decadent cakes, rich pastries, and exquisite confections that promise a lasting impression.</p>',
                'create_date'          => '2025-05-10',
                'start_date'           => '2025-03-15',
                'end_date'             => '2025-07-15',
                'contributor_username' => 'james@bcit.ca'
            ],
            [
                'title'                => 'American Pie Traditions',
                'body' => '<p>American pies represent warmth, tradition, and comfort. Apple pie, filled with cinnamon-spiced apples encased in a buttery crust, symbolizes home and nostalgia. Pumpkin pie, traditionally served during Thanksgiving, combines smooth pumpkin custard with fragrant spices. Sweet cherry pie, bursting with tart cherries, offers a delightful balance of sweet and sour. Pecan pie, rich with caramelized sugar and crunchy pecans, exemplifies Southern hospitality. Pie-making traditions often involve family recipes, passed down through generations, capturing cultural heritage and personal memories. Each pie tells a story, celebrated at family gatherings, holidays, and community events. Regional specialties further highlight Americas diverse culinary landscape, such as key lime pie from Florida, featuring tangy lime filling in a graham cracker crust, and Mississippi mud pie, a chocolate lovers dream. American pies, often enjoyed with whipped cream or a scoop of ice cream, provide comfort and joy, fostering connections and shared experiences around the table. Baking pies, an art cherished by many, continues to thrive as an essential component of American cuisine.</p>',
                'create_date'          => '2025-03-20',
                'start_date'           => '2025-03-10',
                'end_date'             => '2025-06-10',
                'contributor_username' => 'vanessa@bcit.ca'
            ],
        ]);
    }
}
