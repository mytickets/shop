<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'name' => $faker->word,
        'desc' => $faker->word,
        'ident' => $faker->word,
        'image' => $faker->word,
        'xml_name' => $faker->word,
        'xml_cat' => $faker->word,
        'cat_id' => $faker->word,
        'remote_images' => $faker->word,
        'price_amount' => $faker->word,
        'price' => $faker->word
    ];
});
