<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WebUser;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(WebUser::class, function (Faker $faker,$args) {
    $name = $faker->word;
   
    return [
        'tenant_id' => $args['tenant_id'],
     
        'slug'      => Str::slug($name),

    ];
});
