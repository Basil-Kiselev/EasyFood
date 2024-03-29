<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $productsData = [
            [
                'category_id' => '6',
                'article' => 'apple',
                'name' => 'Яблоки "Томсон"',
                'description' => 'Яблоко сорта "Томсон" обладает хрустящей, скалывающейся, чрезвычайно сочной мякотью кремового либо светло-желтого цвета. Яблоко очень ароматное, имеет отличный сладкий вкус с приятной кислинкой.',
                'price' => '300',
                'uom' => 'thing',
                'kcal' => '47',
                'protein' => '0.4',
                'fat' => '0.4',
                'carbohydrate' => '9.8',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/apple.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '5',
                'article' => 'apple_pie',
                'name' => 'Яблочный пирог',
                'description' => 'Яблочный пирог — нежнейший пирог с хрустящим тестом, печеными яблоками и сливочной начинкой. Это не банальная шарлотка или простой песочный пирог с яблоками, а настоящий десерт. Корица придает особый шарм и аромат.',
                'price' => '2000',
                'uom' => 'weight',
                'weight' => '400',
                'kcal' => '207',
                'protein' => '4.5',
                'fat' => '5.2',
                'carbohydrate' => '35.1',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/apple_pie.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '6',
                'article' => 'avocado',
                'name' => 'Авокадо',
                'description' => 'Авокадо эффективно снижает уровень холестерина в крови, а благодаря невысокой энергетической ценности способствует избавлению от лишнего веса. Благодаря высокому содержанию мононенасыщенных жиров, авокадо — ценный продукт для вегетарианцев и сторонников здорового питания. Мякоть авокадо может заменять животные продукты в салатах и бутербродах.',
                'price' => '1200',
                'uom' => 'thing',
                'kcal' => '160',
                'protein' => '2',
                'fat' => '14.7',
                'carbohydrate' => '1.8',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/avocado.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '3',
                'article' => 'beef_with_vegetables',
                'name' => 'Говядина с овощами',
                'description' => 'Нежное мясо говядины тушенное с овощами - простое и очень вкусное блюдо на обед или ужин. К нему идеально подойдет картофельный гарнир, рис или любая другая крупа. Говядина со сладким перцем и морковью тушится с добавлением дижонской горчицы, свежего имбиря, томатной пасты и ароматных приправ. Кусочки мяса во время приготовления пропитываются вкуснейшим соусом, томятся, в результате получаются пикантными и тающими во рту.',
                'price' => '1100',
                'uom' => 'weight',
                'weight' => '200',
                'kcal' => '106',
                'protein' => '8.6',
                'fat' => '6.4',
                'carbohydrate' => '3.8',
                'is_vegan' => '0',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/beef_with_vegetables.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '5',
                'article' => 'cheesecake_zebra',
                'name' => 'Творожная запеканка "зебра"',
                'description' => 'Запеканка творожная – классическое блюдо, самая полезная альтернатива свежему творогу.',
                'price' => '800',
                'uom' => 'weight',
                'weight' => '100',
                'kcal' => '197',
                'protein' => '14.6',
                'fat' => '10.3',
                'carbohydrate' => '11.6',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/cheesecake_zebra.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '4',
                'article' => 'beet_smoothie',
                'name' => 'Свекольный смузи',
                'description' => 'Свекла обладает удивительной пропорцией кальция и натрия — 1:10. Это способствует растворению кальция, который копится в сосудах, что является профилактикой варикоза. Хлор, содержащийся в свекле, очищает почки, печень, желчный пузырь. Железо благотворно влияет на состав крови и образование эритроцитов. Медь, йод, марганец, цинк стимулируют процесс обмена веществ, половую функцию и кроветворения. Цинк улучшает зрение и активизирует действие инсулина.',
                'price' => '890',
                'uom' => 'volume',
                'volume' => '400',
                'kcal' => '80',
                'protein' => '2',
                'fat' => '4.3',
                'carbohydrate' => '8.3',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/beet_smoothie.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '3',
                'article' => 'chicken_roll_with_mushrooms',
                'name' => 'Рулет из курицы с грибами',
                'description' => 'Этот нежный диетический продукт содержит массу микроэлементов и витаминов: E, B1, В2, РР, железо, фосфор, калий, кальций, йод, магний, натрий. Также следует помнить, что по низкому содержанию холестерина, куриное мясо превосходит только рыба.',
                'price' => '760',
                'uom' => 'weight',
                'weight' => '150',
                'kcal' => '310',
                'protein' => '16',
                'fat' => '26',
                'carbohydrate' => '0',
                'is_vegan' => '0',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/chicken_roll_with_mushrooms.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '1',
                'article' => 'greece_salad',
                'name' => 'Греческий салат',
                'description' => 'Греческий салат — это кладезь витаминов, минералов и микроэлементов. Он не только приятен на вкус, но и приносит огромную пользу нашему организму. Не зря жители Средиземноморья отличаются своим долголетием, так как на их столе часто присутствует это блюдо.',
                'price' => '820',
                'uom' => 'weight',
                'weight' => '140',
                'kcal' => '88',
                'protein' => '2.5',
                'fat' => '6.4',
                'carbohydrate' => '4.1',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/greece_salad.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '1',
                'article' => 'green_salad_with_cheese',
                'name' => 'Салат из зелени с сыром',
                'description' => 'Салаты из зелени - лидеры по содержанию кальция (в этом они составляют достойную конкуренцию творогу или молоку), кроме того, в них содержится витамин К, который оказывает влияние на правильную свертываемость крови и достаточное количество марганца, который отлично усваивается организмом.',
                'price' => '570',
                'uom' => 'weight',
                'weight' => '100',
                'kcal' => '64',
                'protein' => '3.5',
                'fat' => '4.6',
                'carbohydrate' => '2.3',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/green_salad_with_cheese.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '4',
                'article' => 'green_smoothie',
                'name' => 'Зеленый смузи',
                'description' => 'Зеленый смузи — это идеальный напиток для детокса организма. Он способствует лучшему пищеварению, снабдит ваш организм всеми питательными веществами, поможет сбросить пару лишних килограммов, уменьшится ваша тяга к сладкому и печеному. ',
                'price' => '890',
                'uom' => 'volume',
                'volume' => '400',
                'kcal' => '29',
                'protein' => '0.7',
                'fat' => '0.2',
                'carbohydrate' => '6',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/green_smoothie.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '2',
                'article' => 'soup_tomato',
                'name' => 'Томатный суп',
                'description' => 'Томатный суп является поставщиком полезного ликопина — красного питательного вещества, который создает мощную антиоксидантную защиту организму, замедляет процесс старения, и помогает клеткам получать кислород. А также содействует кровотворению.',
                'price' => '750',
                'uom' => 'volume',
                'volume' => '250',
                'kcal' => '42',
                'protein' => '1',
                'fat' => '2',
                'carbohydrate' => '5.3',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/soup_tomato.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => '2',
                'article' => 'soup_pumpkin',
                'name' => 'Тыквенный суп',
                'description' => 'Тыкву заочно прозвали «королевой осени». Она легко усваивается организмом и насыщает его полезными веществами. Плод включает в себя витамины групп А, В, Е а также железо, калий и магний.',
                'price' => '750',
                'uom' => 'volume',
                'volume' => '250',
                'kcal' => '61',
                'protein' => '2.3',
                'fat' => '3.3',
                'carbohydrate' => '7.7',
                'is_vegan' => '1',
                'is_recommend' => random_int(0,1),
                'img' => 'storage/img/product_img/soup_pumpkin.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($productsData as $productData) {

            if (!file_exists(base_path('public/img/products'))) {
                mkdir('public/img/products');
            }

            if (file_exists(base_path($productData['img']))) {
                $oldFile = $productData['img'];
                $publicDir = 'public/';
                $newFile = 'img/products/' . $productData['article'] . '.' . 'jpg';
                copy($oldFile, $publicDir . $newFile);
                $productData['img'] = $newFile;
            }

            DB::table('products')->insert($productData);
        }
    }
}
