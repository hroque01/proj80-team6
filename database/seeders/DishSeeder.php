<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Dish;
use App\Models\Restaurant;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dishes = [
            //KEBAB NOT BAD
            [
                'name'=> 'Kebab Piadina',
                'description'=> 'Piadina bella calda 2km',
                'ingredients'=> 'Impasto di piadina bella calda 2km',
                'price'=> 4.50,
                'image'=> 'https://d2j6dbq0eux0bg.cloudfront.net/images/73313140/2981172261.jpg',
                'visible'=> true,
                'restaurant_id'=> 1,
            ],
            [
                'name'=> 'Patatine fritte',
                'description'=> 'Frito belo',
                'ingredients'=> 'ti fidi di me?',
                'price'=> 2.50,
                'image'=> 'https://images.fidhouse.com/fidelitynews/wp-content/uploads/sites/6/2016/03/1457008490_947a03d0316de9c5ec47c435911c5c0d64c0a495-1430067252.jpg?w=580',
                'visible'=> true,
                'restaurant_id'=> 1,
            ],
            [
                'name'=> 'Kebab panino',
                'description'=> 'Kebab panino calda 2km',
                'ingredients'=> 'Impasto di panino bella calda 2km',
                'price'=> 3.50,
                'image'=> 'https://d2j6dbq0eux0bg.cloudfront.net/images/62400814/2367230254.jpg',
                'visible'=> true,
                'restaurant_id'=> 1,
            ],
            [
                'name'=> 'Menu kebab panino',
                'description'=> 'Panino kebab + patatine + bibita',
                'ingredients'=> 'Panino, patatine',
                'price'=> 7.50,
                'image'=> 'http://kappa2kebab.com/wp-content/uploads/2020/09/m1.jpg',
                'visible'=> true,
                'restaurant_id'=> 1,
            ],
            [
                'name'=> 'Menu kebab piadina',
                'description'=> 'Panino kebab + patatine + bibita',
                'ingredients'=> 'Panino, patatine',
                'price'=> 8.50,
                'image'=> 'https://inconsegna.com/wp-content/uploads/2020/10/menu-piadina.jpg',
                'visible'=> true,
                'restaurant_id'=> 1,
            ],
            //PIZZA PALACE
            [
                'name'=> 'Pizza Margherita',
                'description'=> 'Tipica margheritina per la principessa',
                'ingredients'=> 'Pomodoro, Mozzarella',
                'price'=> 4.50,
                'image'=> 'https://www.finedininglovers.it/sites/g/files/xknfdk1106/files/styles/recipes_1200_800/public/fdl_content_import_it/margherita-50kalo.jpg.webp?itok=QlO8_AHv',
                'visible'=> true,
                'restaurant_id'=> 2,
            ],
            [
                'name'=> 'Diavola',
                'description'=> 'Pronto per bruciare tra le fiamme? ti abbraccia il piccante del diavolo',
                'ingredients'=> 'Pomodoro, Mozzarella, Salame piccante con grana',
                'price'=> 6.50,
                'image'=> 'https://i1.wp.com/www.piccolericette.net/piccolericette/wp-content/uploads/2017/06/3236_Pizza.jpg?resize=895%2C616&ssl=1',
                'visible'=> true,
                'restaurant_id'=> 2,
            ],
            [
                'name'=> 'Prosciutto e funghi',
                'description'=> 'Siamo in campagna con qualche oink oink e un funghetto che spunta dietro di te!',
                'ingredients'=> 'Pomodoro, Mozzarella, Prosciutto cotto e funghi',
                'price'=> 7,
                'image'=> 'https://www.pizzeriasenzatempo.it/wp-content/uploads/2020/04/PROSCIUTTO-E-FUNGHI.jpg',
                'visible'=> true,
                'restaurant_id'=> 2,
            ],
            [
                'name'=> 'Capricciosa',
                'description'=> 'Una pizza leggermente capricciosa!',
                'ingredients'=> 'Pomodoro, mozzarella, prosciutto, funghi, carciofi e olive',
                'price'=> 7.50,
                'image'=> 'https://wips.plug.it/cips/buonissimo.org/cms/2019/09/pizza-capricciosa.jpg',
                'visible'=> true,
                'restaurant_id'=> 2,
            ],
            [
                'name'=> 'Mantovana',
                'description'=> 'Da mantova!',
                'ingredients'=> 'Pomodoro, Mozzarella, Salsiccia, Parmigiano',
                'price'=> 6.50,
                'image'=> 'https://1.bp.blogspot.com/-g-dHqMIl5EU/XYMsT21m83I/AAAAAAAAVfk/2IhuAk38O307IEMxhPREjli7r_svZ9vDwCEwYBhgL/s1600/pizza%2Bmantovana2.jpg',
                'visible'=> true,
                'restaurant_id'=> 2,
            ],
            //SUSHI YA!
            [
                'name'=> 'Riso cantonese',
                'description'=> '',
                'ingredients'=> 'Riso, piselli, speck, uova',
                'price'=> 5,
                'image'=> 'https://www.giallozafferano.it/images/229-22992/Riso-alla-cantonese_450x300.jpg',
                'visible'=> true,
                'restaurant_id'=> 3,
            ],
            [
                'name'=> 'Uramaki Ebiten',
                'description'=> "Un gamberetto tuffatosi nell'olio fritto e caldo bollente che ribolle mlml",
                'ingredients'=> 'Riso, gambero fritto, alga nori',
                'price'=> 9,
                'image'=> 'https://www.deabyday.tv/.imaging/default/article/guides/cucina-e-ricette/primi/Uramaki-ebiten--la-ricetta-originale-giapponese/imageOriginal.jpg',
                'visible'=> true,
                'restaurant_id'=> 3,
            ],
            [
                'name'=> 'Sashimi al salmone',
                'description'=> '',
                'ingredients'=> 'Riso e salmone',
                'price'=> 3,
                'image'=> 'https://primochef.it/wp-content/uploads/2021/11/SH_sashimi_di_salmone.jpg',
                'visible'=> true,
                'restaurant_id'=> 3,
            ],
            [
                'name'=> 'Riso cantonese',
                'description'=> 'Pomodoro, Mozzarella, Salsiccia, Parmigiano',
                'ingredients'=> 'Farina, Lievito',
                'price'=> 6.50,
                'image'=> 'https://1.bp.blogspot.com/-g-dHqMIl5EU/XYMsT21m83I/AAAAAAAAVfk/2IhuAk38O307IEMxhPREjli7r_svZ9vDwCEwYBhgL/s1600/pizza%2Bmantovana2.jpg',
                'visible'=> true,
                'restaurant_id'=> 3,
            ],

        ];
        
        foreach ($dishes as $dish) {
            $dish = Dish::create($dish);
        }
    }
}
