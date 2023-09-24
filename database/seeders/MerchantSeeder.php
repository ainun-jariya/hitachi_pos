<?php

namespace Database\Seeders;

use App\Services\ImageProcessor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Merchant::factory(9)->create();
        \App\Models\Merchant::all()->each(function ($merchant) {
            $userFactory = \App\Models\User::factory()->create();
            $userFactory->userable()->associate($merchant)->save();
            $addressFactory = \App\Models\Address::factory()->create();
            $addressFactory->addressable()->associate($userFactory)->save();
            $imageFactory = \App\Models\Image::factory()->create();
            $imageFactory->imageable()->associate($userFactory)->save();
//            $imageProcessor = new ImageProcessor();
//            $imageProcessor->saveImage(file_get_contents($imageFactory->first()->file), $userFactory);
        });
    }
}
