<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Owner::factory(9)->create();
        \App\Models\Owner::all()->each(function ($owner) {
            $userFactory = \App\Models\User::factory()->create();
            $userFactory->userable()->associate($owner)->save();
            $addressFactory = \App\Models\Address::factory()->create();
            $addressFactory->addressable()->associate($userFactory)->save();
            $imageFactory = \App\Models\Image::factory()->create();
            $imageFactory->imageable()->associate($userFactory)->save();
//            $imageProcessor = new ImageProcessor();
//            $imageProcessor->saveImage(file_get_contents($imageFactory->first()->file), $userFactory);
        });
    }
}
