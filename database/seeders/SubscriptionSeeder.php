<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subscription;


class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriptions = [
            [
                'name' => 'Base Subscription',
                'price' => 2.99,
                'duration' => '24'
            ],
            [
                'name' => 'Medium Subscription',
                'price' => 5.99,
                'duration' => '72'
            ],
            [
                'name' => 'Premium Subscription',
                'price' => 9.99,
                'duration' => '144'
            ],
        ];

        foreach ($subscriptions as $subscription) {
            $new_subscription = new Subscription();

            $new_subscription->name = $subscription['name'];
            $new_subscription->price = $subscription['price'];
            $new_subscription->duration = $subscription['duration'];

            $new_subscription->save();
        };
    }
}
