<?php

use App\Model\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 20)->create();

        $products = Product::select('id')->get();

        $faker = Faker\Factory::create();

        foreach ($products as $product) {
        	$product->addMediaFromUrl($faker->imageUrl)->toMediaCollection('images');
        }
    }
}
