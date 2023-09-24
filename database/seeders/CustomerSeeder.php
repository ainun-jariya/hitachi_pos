<?php

namespace Database\Seeders;

use App\Services\ImageProcessor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Customer::factory(100)->create()->each(function ($customer) {
            $userFactory = \App\Models\User::factory()->create();
            $userFactory->userable()->associate($customer)->save();
            $addressFactory = \App\Models\Address::factory()->create();
            $addressFactory->addressable()->associate($userFactory);
            $imageFactory = \App\Models\Image::factory()->create();
            $imageFactory->imageable()->associate($userFactory)->save();
//            $imageProcessor = new ImageProcessor();
//            $imageProcessor->saveImage(file_get_contents($imageFactory->first()->file), $user);
        });
    }
}
