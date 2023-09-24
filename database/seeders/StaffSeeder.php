<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Outlet::all()->each(function ($outlet) {
            $staff = \App\Models\Staff::factory(rand(2,5))->make();
            $staff->each(function ($staf) use ($outlet) {
                $outlet->staff()->save($staf);
                $userFactory = \App\Models\User::factory()->create();
                $userFactory->userable()->associate($staf)->save();
                $addressFactory = \App\Models\Address::factory()->create();
                $addressFactory->addressable()->associate($userFactory);
                $imageFactory = \App\Models\Image::factory()->create();
                $imageFactory->imageable()->associate($userFactory)->save();
//            $imageProcessor = new ImageProcessor();
//            $imageProcessor->saveImage(file_get_contents($imageFactory->first()->file), $user);
            });
        });
    }
}
