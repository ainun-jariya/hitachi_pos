<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Owner::all()->each(function ($owner) {
            $outlet = \App\Models\Outlet::factory()->make();
            $addressFactory = \App\Models\Address::factory()->create();
            $addressFactory->addressable()->associate($outlet)->save();
            $owner->outlets()->save($outlet);
        });
    }
}
