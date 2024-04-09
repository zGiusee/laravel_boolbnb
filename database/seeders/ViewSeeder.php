<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\View;
use Faker\Generator as Faker;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 250; $i++) {
            $new_view = new View();
            $new_view->apartment_id = 104;
            $new_view->date = $faker->randomElement(['2024-01-23', '2024-02-09', '2024-03-19', '2024-04-04', '2024-04-21', '2024-03-02']);
            $new_view->ip = $faker->localIpv4();

            $new_view->save();
        }
    }
}
