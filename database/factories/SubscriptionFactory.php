<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Subscription;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'membre_id'=>$faker->numberBetween(1,20),
        'is_expired'=>$faker->numberBetween(0,1)
    ];
});
