<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Site\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'title' => $faker->word,
        'code' => $faker->word,
        'url' => $faker->word
    ];
});
