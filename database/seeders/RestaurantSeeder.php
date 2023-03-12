<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;
use App\Models\Typology;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'business_name' => 'Kebab not bad',
                'description' => 'Kebab buono ordinate qui!',
                'address' => 'Via Cristoforo Colombo, 24F',
                'opening_time' => '10:00:00',
                'closure_time' => '01:00:00',
                'delivery_price' => 5,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/piadina.jpg',
                'user_id' => 1,
            ],
            [
                'business_name' => 'Pizza Place',
                'description' => 'Pizza amore, ordina pizza!',
                'address' => 'Via Garibaldi, 12',
                'opening_time' => '12:00:00',
                'closure_time' => '00:00:00',
                'delivery_price' => 5,
                'image' => 'https://giallozafferano.it/images/249-24919/Pizza-napoletana_650x433_wm.jpg',
                'user_id' => 2,
            ],
            [   
                'business_name' => 'Sushi Ya!',
                'description' => 'Il miglior sushi della città',
                'address' => 'Via Roma, 15',
                'opening_time' => '11:30:00',
                'closure_time' => '23:00:00',
                'delivery_price' => 3,
                'image' => 'https://www.sushiya.it/wp-content/uploads/2019/12/logo-negativo-300x151.png',
                'user_id' => 3,
            ],
            [   
                'business_name' => 'Burger Busters',
                'description' => 'I nostri hamburger sono da urlo',
                'address' => 'Via delle Rose, 3',
                'opening_time' => '12:00:00',
                'closure_time' => '22:00:00',
                'delivery_price' => 4, 
                'image' => 'https://www.burgerbusters.com/wp-content/uploads/2019/05/BurgerBustersLogo_2x-e1559020219277.png',
                'user_id' => 4,
            ],
            [   
                'business_name' => 'Ristorante Cinese Ming',
                'description' => 'Piatti tipici cinesi', 
                'address' => 'Via dei Tigli, 7', 
                'opening_time' => '11:30:00',
                'closure_time' => '23:00:00',
                'delivery_price' => 2, 
                'image' => 'https://www.ristoranteming.it/wp-content/uploads/2017/05/logo-1-01-300x146.png', 
                'user_id' => 5,
            ],
            [   
                'business_name' => 'Taj Mahal',
                'description' => 'Specialità indiane',
                'address' => 'Via delle Magnolie, 12',
                'opening_time' => '12:30:00',
                'closure_time' => '22:30:00',
                'delivery_price' => 4, 
                'image' => 'https://www.tajmahal.it/wp-content/uploads/2017/11/taj-mahal-logo.png', 
                'user_id' =>6,
            ],
            [   'business_name' => 'Taverna Greca',
                'description' => 'Cibo greco tradizionale', 
                'address' => 'Via degli Ulivi, 10', 
                'opening_time' => '12:00:00',
                'closure_time' => '23:00:00',
                'delivery_price' => 5,
                'image' => 'https://www.tavernagreca.com/wp-content/uploads/2019/08/Taverna-Greca-Logo.jpg',
                'user_id' => 7, 
            ],
            [   
                'business_name' => 'La Piazzetta',
                'description' => 'Specialità italiane',
                'address' => 'Piazza del Popolo, 1',
                'opening_time' => '11:30:00', 
                'closure_time' => '23:30:00', 
                'delivery_price' => 3,
                'image' => 'https://www.lapiazzetta.it/wp-content/uploads/2019/04/logo-1-1.png',
                'user_id' => 8,
            ],
            [
                'business_name' => 'Pizza House',
                'description' => 'Pizza buona a prezzi giusti!',
                'address' => 'Via Roma, 10',
                'opening_time' => '11:00:00',
                'closure_time' => '23:00:00',
                'delivery_price' => 3.50,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pizza.jpg',
                'user_id' => 9,
            ],
            [
                'business_name' => 'Pizzeria Gigi',
                'description' => 'Pizza napoletana autentica',
                'address' => 'Via Garibaldi, 35',
                'opening_time' => '18:00:00',
                'closure_time' => '00:00:00',
                'delivery_price' => 2.50,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pizza-2.jpg',
                'user_id' => 10,
            ],
            [
                'business_name' => 'Pizza Italia',
                'description' => 'Pizza a taglio e a portafoglio',
                'address' => 'Via Vittorio Emanuele, 82',
                'opening_time' => '09:00:00',
                'closure_time' => '22:00:00',
                'delivery_price' => 4.00,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pizza-3.jpg',
                'user_id' => 11,
            ],
            [
                'business_name' => 'Pizza Express',
                'description' => 'Pizza veloce e gustosa',
                'address' => 'Via Carducci, 12',
                'opening_time' => '10:00:00',
                'closure_time' => '23:00:00',
                'delivery_price' => 3.00,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pizza-4.jpg',
                'user_id' => 12,
            ],
            [
                'business_name' => 'La Margherita',
                'description' => 'Pizza con ingredienti freschi',
                'address' => 'Via Diaz, 19',
                'opening_time' => '11:30:00',
                'closure_time' => '23:30:00',
                'delivery_price' => 3.50,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pizza-5.jpg',
                'user_id' => 13,
            ],
            [
                'business_name' => 'Pizza Napoletana',
                'description' => 'La vera pizza napoletana',
                'address' => 'Via Dante Alighieri, 5',
                'opening_time' => '18:00:00',
                'closure_time' => '23:30:00',
                'delivery_price' => 4.00,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pizza-6.jpg',
                'user_id' => 14,
            ],
            // Pasticcerie
            [
                'business_name' => 'Dolcezze al Cioccolato',
                'description' => 'Pasticceria artigianale con specialità al cioccolato',
                'address' => 'Via del Gelato, 12',
                'opening_time' => '08:00:00',
                'closure_time' => '20:00:00',
                'delivery_price' => 3.5,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/ciambelle.jpg',
                'user_id' => 15,
            ],
            [ 
                'business_name' => 'Caffetteria delizia',
                'description' => 'Pasticceria e caffetteria',
                'address' => 'Via delle Palme, 43',
                'opening_time' => '07:00:00',
                'closure_time' => '22:00:00',
                'delivery_price' => 2,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/bignè.jpg',
                'user_id' => 16,
            ],
            [
                'business_name' => 'Pasticceria Coccole',
                'description' => 'Pasticceria tradizionale con prodotti artigianali',
                'address' => 'Via Roma, 18',
                'opening_time' => '06:30:00',
                'closure_time' => '21:00:00',
                'delivery_price' => 4,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/cornetti.jpg',
                'user_id' => 17,
            ],
            [
                'business_name' => 'Vegan Paradise',
                'description' => 'Ristorante vegano con piatti creativi',
                'address' => 'Via delle Rose, 23',
                'opening_time' => '12:00:00',
                'closure_time' => '22:00:00',
                'delivery_price' => 5,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/veganburger.jpg',
                'user_id' => 18,
            ],
            [
                'business_name' => 'Il Girasole',
                'description' => 'Ristorante vegano e biologico',
                'address' => 'Via dei Girasoli, 7',
                'opening_time' => '11:30:00',
                'closure_time' => '20:00:00',
                'delivery_price' => 3,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/insalata_veg.jpg',
                'user_id' => 19,
            ],

            // Bar
            [
                'business_name' => 'Bar Centro',
                'description' => 'Bar con caffetteria e aperitivi',
                'address' => 'Via Roma, 54',
                'opening_time' => '06:00:00',
                'closure_time' => '23:00:00',
                'delivery_price' => 2.5,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/sfogliatelle.jpg',
                'user_id' => 20,
            ],

            [   'business_name' => 'The Fisherman',
                'description' => 'Cucina di mare di alta qualità',
                'address' => 'Via del Mare, 12',
                'opening_time' => '12:00:00',
                'closure_time' => '23:00:00',
                'delivery_price' => 8,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pesce_spada.jpg',
                'user_id' => 21,
            ],
            [   'business_name' => 'Bar volontario',
                'description' => 'colazione a volonta',
                'address' => 'Via delle Rose, 5',
                'opening_time' => '18:00:00',
                'closure_time' => '02:00:00',
                'delivery_price' => 4,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/bar_pub.jpg',
                'user_id' => 22,
            ],
            [   'business_name' => 'Kebab Abhdul',
                'description' => 'Kebab buonissimi senza scipola',
                'address' => 'Via del Corso, 45',
                'opening_time' => '19:00:00',
                'closure_time' => '02:00:00',
                'delivery_price' => 7,  
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/cocktail_bar.jpg',
                'user_id' => 23,
            ],

            [   'business_name' => 'Pescheria del Porto',
                'description' => 'Pesce fresco e cucina di mare tradizionale',
                'address' => 'Via del Porto, 6',    'opening_time' => '11:00:00',
                'closure_time' => '22:00:00',
                'delivery_price' => 10,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pescheria_porto.jpg',
                'user_id' =>24,
            ],

            [   'business_name' => 'Italianish',
                'description' => 'Piatti italiani da tutta ITALIA',
                'address' => 'Via del santissimo 6',    'opening_time' => '11:00:00',
                'closure_time' => '22:00:00',
                'delivery_price' => 10,
                'image' => 'https://gnammydelivery.it/wp-content/uploads/2021/01/pescheria_porto.jpg',
                'user_id' =>25,
            ]
        ];

        foreach ($restaurants as $restaurant) {
            $restaurant = Restaurant::create($restaurant);
        }

         // Relazione M to M
            // Creazione ristoranti e associazione da 1 a 5 tipologie random

            //KEBAB NOT BAD
            $restaurant_1 = Restaurant::find(1);
            $typology_1 = Typology::find([11]);
            $restaurant_1->typologies()->attach($typology_1);

            //PIZZA PLACE
            $restaurant_2 = Restaurant::find(2);
            $typology_2 = Typology::find([7]);
            $restaurant_2->typologies()->attach($typology_2);

            //SUSHI YAH
            $restaurant_3 = Restaurant::find(3);
            $typology_3 = Typology::find([8]);
            $restaurant_3->typologies()->attach($typology_3);
            $restaurant_second3 = Restaurant::find(3);
            $typology_second3 = Typology::find([13]);
            $restaurant_second3->typologies()->attach($typology_second3);
            $restaurant_third3 = Restaurant::find(3);
            $typology_third3 = Typology::find([2]);
            $restaurant_third3->typologies()->attach($typology_third3);

            //BURGER BUSTERS
            $restaurant_4 = Restaurant::find(4);
            $typology_4 = Typology::find([1]);
            $restaurant_4->typologies()->attach($typology_4);

            //Ristorante Cinese Ming
            $restaurant_5 = Restaurant::find(5);
            $typology_5 = Typology::find([2]);
            $restaurant_5->typologies()->attach($typology_5);

            //Taj Mahal
            $restaurant_6 = Restaurant::find(6);
            $typology_6 = Typology::find([4]);
            $restaurant_6->typologies()->attach($typology_6);

            //Taverna Greca
            $restaurant_7 = Restaurant::find(7);
            $typology_7 = Typology::find([3]);
            $restaurant_7->typologies()->attach($typology_7);

            //La Piazzetta
            $restaurant_8 = Restaurant::find(8);
            $typology_8 = Typology::find([7]);
            $restaurant_8->typologies()->attach($typology_8);
            $restaurant_second8 = Restaurant::find(8);
            $typology_second8 = Typology::find([5]);
            $restaurant_second8->typologies()->attach($typology_second8);

            //Pizza House
            $restaurant_9 = Restaurant::find(9);
            $typology_9 = Typology::find([7]);
            $restaurant_9->typologies()->attach($typology_9);
            $restaurant_second9 = Restaurant::find(9);
            $typology_second9 = Typology::find([5]);
            $restaurant_second9->typologies()->attach($typology_second9);

            //Pizzeria Gigi
            $restaurant_10 = Restaurant::find(10);
            $typology_10 = Typology::find([7]);
            $restaurant_10->typologies()->attach($typology_10);
            $restaurant_second10 = Restaurant::find(10);
            $typology_second10 = Typology::find([5]);
            $restaurant_second10->typologies()->attach($typology_second10);

            //Pizza Italia
            $restaurant_11 = Restaurant::find(11);
            $typology_11 = Typology::find([7]);
            $restaurant_11->typologies()->attach($typology_11);
            $restaurant_second11 = Restaurant::find(11);
            $typology_second11 = Typology::find([5]);
            $restaurant_second11->typologies()->attach($typology_second11);

            //pizza express
            $restaurant_12 = Restaurant::find(12);
            $typology_12 = Typology::find([7]);
            $restaurant_12->typologies()->attach($typology_12);
            $restaurant_second12 = Restaurant::find(12);
            $typology_second12 = Typology::find([5]);
            $restaurant_second12->typologies()->attach($typology_second12);

            //La Margherita
            $restaurant_13 = Restaurant::find(13);
            $typology_13 = Typology::find([7]);
            $restaurant_13->typologies()->attach($typology_13);
            $restaurant_second13 = Restaurant::find(13);
            $typology_second13 = Typology::find([5]);
            $restaurant_second13->typologies()->attach($typology_second13);

            //Pizza Napoletana
            $restaurant_14 = Restaurant::find(14);
            $typology_14 = Typology::find([7]);
            $restaurant_14->typologies()->attach($typology_14);
            $restaurant_second14 = Restaurant::find(14);
            $typology_second14 = Typology::find([5]);
            $restaurant_second14->typologies()->attach($typology_second14);

            //Dolcezze al Cioccolato
            $restaurant_15 = Restaurant::find(15);
            $typology_15 = Typology::find([9]);
            $restaurant_15->typologies()->attach($typology_15);
            $restaurant_second15 = Restaurant::find(15);
            $typology_second15 = Typology::find([12]);
            $restaurant_second15->typologies()->attach($typology_second15);

            //Caffetteria delizia
            $restaurant_16 = Restaurant::find(16);
            $typology_16 = Typology::find([12]);
            $restaurant_16->typologies()->attach($typology_16);

            //Pasticceria Coccole
            $restaurant_17 = Restaurant::find(17);
            $typology_17 = Typology::find([9]);
            $restaurant_17->typologies()->attach($typology_17);
            
            //Vegan Paradise
            $restaurant_18 = Restaurant::find(18);
            $typology_18 = Typology::find([10]);
            $restaurant_18->typologies()->attach($typology_18);

            //Il Girasole
            $restaurant_19 = Restaurant::find(19);
            $typology_19 = Typology::find([10]);
            $restaurant_19->typologies()->attach($typology_19);
            
            //Bar Centro
            $restaurant_20 = Restaurant::find(20);
            $typology_20 = Typology::find([12]);
            $restaurant_20->typologies()->attach($typology_20);
            $restaurant_second20 = Restaurant::find(20);
            $typology_second20 = Typology::find([9]);
            $restaurant_second20->typologies()->attach($typology_second20);

            //The Fisherman
            $restaurant_21 = Restaurant::find(21);
            $typology_21 = Typology::find([13]);
            $restaurant_21->typologies()->attach($typology_21);

            //Bar Pub
            $restaurant_22 = Restaurant::find(22);
            $typology_22 = Typology::find([12]);
            $restaurant_22->typologies()->attach($typology_22);

            //Kebab Abhdul
            $restaurant_23 = Restaurant::find(23);
            $typology_23 = Typology::find([11]);
            $restaurant_23->typologies()->attach($typology_23);

            //Pescheria del Porto
            $restaurant_24 = Restaurant::find(24);
            $typology_24 = Typology::find([13]);
            $restaurant_24->typologies()->attach($typology_24);

            //Pescheria del Porto
            $restaurant_25 = Restaurant::find(25);
            $typology_25 = Typology::find([5]);
            $restaurant_25->typologies()->attach($typology_25);
            
    }
}