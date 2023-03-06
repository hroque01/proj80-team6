<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        // Relazione 1 to 1
        // Associazione tra user a ristorante
        User::all()->each(function ($r) {
            $u = Restaurant::factory()->make();
            $u->restaurant()->associate($r);
            $u->save();
        });

    }
}