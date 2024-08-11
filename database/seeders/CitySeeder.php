<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Dakar'],
            ['name' => 'Saint Louis'],
            ['name' => 'Matam'],
            ['name' => 'Thiès'],
            ['name' => 'Ziguinchor'],
            ['name' => 'Kaolack'],
            ['name' => 'Touba'],
            ['name' => 'Diourbel'],
            ['name' => 'Saint-Louis'],
            ['name' => 'Mbour'],
            ['name' => 'Sédhiou'],
            ['name' => 'Kolda'],
            ['name' => 'Tamba'],
            ['name' => 'Richard Toll'],
            ['name' => 'Nioro'],
            ['name' => 'Louga'],
            ['name' => 'Kaffrine'],
            ['name' => 'Bambey'],
            ['name' => 'Matam'],
            ['name' => 'Kédougou'],
            ['name' => 'Gossas'],
            ['name' => 'Ndioum'],
            ['name' => 'Mbacké'],
        ];
        DB::table('cities')->insert($cities);
    }
}


//commande pour les seeder :  php artisan db:seed --class=CitySeeder