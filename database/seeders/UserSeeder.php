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
            'business_name' => 'Kebab not bad',
            'email' => 'kebab.not.bad@gmail.com',
            'email_verified_at' => '19:00',
            'password' => Hash::make('kekbabnotbad123'),
            'address' => 'Via Cristoforo Colombo, 24F',
            'vat_number' => '45892346810'
        ],
        [
            'business_name' => 'Pizza Place',
            'email' => 'pizza.place@gmail.com',
            'email_verified_at' => '19:00',
            'password' => Hash::make('pizzaplace123'),
            'address' => 'Via Garibaldi, 12',
            'vat_number' => '45892346811'
        ],
    ];
    
    foreach ($users as $user) {
        $user = User::create($user);
    }
}
}