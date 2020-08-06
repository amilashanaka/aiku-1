<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Website;
use Faker\Generator as Faker;

$factory->define(Website::class, function (Faker $faker,$arg) {
    $name = $faker->word;
   
    return [
        'tenant_id' => $args['tenant_id'],
     
        'slug'      => Str::slug($name),

    ];
});
