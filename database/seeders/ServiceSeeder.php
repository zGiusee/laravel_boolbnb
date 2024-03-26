<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $services = [
            [
                'name' => 'Parking',
                'icon' => 'fa-solid fa-square-parking',
            ],
            [
                'name' => 'Wi-Fi',
                'icon' => 'fa-solid fa-wifi',
            ],
            [
                'name' => 'Bathroom',
                'icon' => 'fa-solid fa-bath',
            ],
            [
                'name' => 'Pool',
                'icon' => 'fa-solid fa-person-swimming',
            ],
            [
                'name' => 'Elevator',
                'icon' => 'fa-solid fa-elevator',
            ],
            [
                'name' => 'Facilities For Disabled Guests',
                'icon' => 'fa-brands fa-accessible-icon',
            ],
            [
                'name' => 'Shower',
                'icon' => 'fa-solid fa-shower',
            ],
            [
                'name' => 'Heating',
                'icon' => 'fa-solid fa-fire',
            ],
            [
                'name' => 'Dishwhasher',
                'icon' => 'fa-solid fa-pump-soap',
            ],
            [
                'name' => 'Tv',
                'icon' => 'fa-solid fa-tv',
            ],
            [
                'name' => 'Kitchen',
                'icon' => 'fa-solid fa-kitchen-set',
            ],
            [
                'name' => 'Air Conditioning',
                'icon' => 'fa-solid fa-fan',
            ],
        ];

        foreach ($services as $service) {

            $new_service = new Service();
            $new_service->name = $service['name'];
            $new_service->icon = $service['icon'];
            $new_service->save();
        }
        //
    }
}
