<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender'=>$faker->numberBetween(0,1)
    ];
});
