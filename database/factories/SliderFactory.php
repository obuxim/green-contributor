<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Slider::class, function (Faker $faker) {
    return [
        'link' => $faker->imageUrl(1000, 500)
    ];
});
