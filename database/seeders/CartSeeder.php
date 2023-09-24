<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Customer::all()->each(function ($customer) {
            $user = $customer->user;
            $cartFactory = \App\Models\Cart::factory()->make();
            $user->cart()->save($cartFactory);
            $cartDetailFactories = \App\Models\CartDetail::factory(rand(1,5))->make();
            $cartDetailFactories->each(function ($cartDetailFactory) use ($cartFactory) {
                $cartFactory->details()->save($cartDetailFactory);
            });
        });

        \App\Models\Staff::where('level', 'staff')->get()->each(function ($staff) {
            $user = $staff->user;
            $cartFactory = \App\Models\Cart::factory()->make();
            $user->cart()->save($cartFactory);
            $cartDetailFactories = \App\Models\CartDetail::factory(rand(1,5))->make();
            $cartDetailFactories->each(function ($cartDetailFactory) use ($cartFactory) {
                $cartFactory->details()->save($cartDetailFactory);
            });
        });
    }
}
