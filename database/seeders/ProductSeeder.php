<?php

namespace Database\Seeders;

use App\Services\ImageProcessor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Merchant::all()->each(function ($merchant) {
            \App\Models\Product::factory(rand(5, 10))->make()->each(function ($product) use ($merchant) {
                $merchant->products()->save($product);
                $productVariantFactories = \App\Models\ProductVariant::factory(rand(1, 5))->make();
                $productVariantFactories->each(function ($productVariantFactory) use ($product) {
                    $product->variants()->save($productVariantFactory);
                    $imageFactory = \App\Models\Image::factory()->create();
                    $imageFactory->imageable()->associate($productVariantFactory)->save();
                    //                $imageProcessor = new ImageProcessor();
                    //                $imageProcessor->saveImage(file_get_contents($imageFactory->first()->file), $productVariant);
                });
            });
        });
    }
}
