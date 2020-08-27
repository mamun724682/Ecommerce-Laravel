<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => Category::all()->random()->id,
        'title' => $faker->sentence,
        'slug' => Str::slug($faker->sentence),
        'description' => $faker->realText,
        'price' => rand(100, 1000),
    ];
});
