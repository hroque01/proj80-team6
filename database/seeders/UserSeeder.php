<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


use App\Models\User;
use App\Models\Restaurant;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $users = [
        [
            'email' => 'kebab.not.bad@gmail.com',
            'email_verified_at' => '19:00',
            'password' => Hash::make('kekbabnotbad123'),
            'vat_number' => '45892346810'
        ],
        [
            'email' => 'pizza.place@gmail.com',
            'email_verified_at' => '12:00',
            'password' => Hash::make('pizzaplace123'),
            'vat_number' => '45892346811'
        ],
        [
            'email' => 'sushi.yah@gmail.com',
            'email_verified_at' => '11:00',
            'password' => Hash::make('sushiyah123'),
            'vat_number' => '45852336811'
        ],
        [
            'email' => 'burger.busters@gmail.com',
            'email_verified_at' => '01:00',
            'password' => Hash::make('burgerbusters123'),
            'vat_number' => '47812334811'
        ],
        [
            'email' => 'listolante.mingchun@gmail.com',
            'email_verified_at' => '11:00',
            'password' => Hash::make('listolantemingchun123'),
            'vat_number' => '47856734811'
        ],
        [
            'email' => 'taj.mahalkita@gmail.com',
            'email_verified_at' => '21:00',
            'password' => Hash::make('tajmahalkita123'),
            'vat_number' => '47853257881'
        ],
        [
            'email' => 'taverna.greca@gmail.com',
            'email_verified_at' => '05:00',
            'password' => Hash::make('tavernagreca123'),
            'vat_number' => '47853257881'
        ],
        [
            'email' => 'la.pizzetta@gmail.com',
            'email_verified_at' => '07:00',
            'password' => Hash::make('pizzetta123'),
            'vat_number' => '47888887881'
        ],
        [
            'email' => 'pizza.house@gmail.com',
            'email_verified_at' => '11:00',
            'password' => Hash::make('pizzahouse123'),
            'vat_number' => '47844888788'
        ],
        [
            'email' => 'pizzeria.gigi@gmail.com',
            'email_verified_at' => '10:00',
            'password' => Hash::make('pizzagigi123'),
            'vat_number' => '47855828788'
        ],
        [
            'email' => 'pizza.italia@gmail.com',
            'email_verified_at' => '16:00',
            'password' => Hash::make('pizzaitalia123'),
            'vat_number' => '47857428788'
        ],
        [
            'email' => 'pizza.express@gmail.com',
            'email_verified_at' => '15:00',
            'password' => Hash::make('pizzaexpresssss123'),
            'vat_number' => '47845677328'
        ],
        [
            'email' => 'pizza.margherita@gmail.com',
            'email_verified_at' => '12:00',
            'password' => Hash::make('margheritina123'),
            'vat_number' => '47847665328'
        ],
        [
            'email' => 'pizzanapoly@gmail.com',
            'email_verified_at' => '09:00',
            'password' => Hash::make('pizzanapoly2'),
            'vat_number' => '47844455318'
        ],
        [
            'email' => 'dolcezzeCioccolato@gmail.com',
            'email_verified_at' => '09:00',
            'password' => Hash::make('dolcezzeCioccolato222'),
            'vat_number' => '47844455328'
        ],
        [
            'email' => 'deliziadezioso@gmail.com',
            'email_verified_at' => '09:00',
            'password' => Hash::make('deliz11iadezios'),
            'vat_number' => '47844433328'
        ],
        [
            'email' => 'coccolepertutti@gmail.com',
            'email_verified_at' => '09:00',
            'password' => Hash::make('coccolepertutti69'),
            'vat_number' => '47885749228'
        ],
        [
            'email' => 'veganiparadise@gmail.com',
            'email_verified_at' => '19:00',
            'password' => Hash::make('veganiparadiso????'),
            'vat_number' => '47885750228'
        ],
        [
            'email' => 'ilgirasole@gmail.com',
            'email_verified_at' => '09:00',
            'password' => Hash::make('nongiromasosole'),
            'vat_number' => '47885543228'
        ],
        [
            'email' => 'Bar.Centro@gmail.com',
            'email_verified_at' => '21:00',
            'password' => Hash::make('Bar.Centro@@'),
            'vat_number' => '47532543228'
        ],
        [
            'email' => 'thefirsshmano@gmail.com',
            'email_verified_at' => '23:00',
            'password' => Hash::make('@thefirsshmano'),
            'vat_number' => '47578543228'
        ],
        [
            'email' => 'Barvolontario@gmail.com',
            'email_verified_at' => '23:00',
            'password' => Hash::make('@Barvolontario'),
            'vat_number' => '47573743228'
        ],
        [
            'email' => 'abdulhahmel@gmail.com',
            'email_verified_at' => '23:00',
            'password' => Hash::make('@abdulhahmelIlgrande69'),
            'vat_number' => '47577643228'
        ],
        [
            'email' => 'perschieraPortoAmerican@gmail.com',
            'email_verified_at' => '23:00',
            'password' => Hash::make('@miglioripescatoredecapusmundi'),
            'vat_number' => '47333643228'
        ],
        [
            'email' => 'Italianish.arebetter@gmail.com',
            'email_verified_at' => '23:00',
            'password' => Hash::make('@Italianish.arebetter'),
            'vat_number' => '4733366228'
        ],
        [
            'email' => 'mexicanpuertorico@gmail.com',
            'email_verified_at' => '23:00',
            'password' => Hash::make('@mexicanpuertorico'),
            'vat_number' => '4733344226'
        ],
        [
            'email' => 'classe80@gmail.com',
            'email_verified_at' => '23:00',
            'password' => Hash::make('@classe80gnomes'),
            'vat_number' => '4733344229'
        ],
    ];
    
    foreach ($users as $user) {
        $user = User::create($user);
    }
}
}