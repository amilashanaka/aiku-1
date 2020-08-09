<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stores\Store;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker,$tenant_id) {

    $name = $faker->word;

    return [
        'tenant_id' => $tenant_id,
        'name'      => $name,
        'slug'      => Str::slug($name),

    ];
});
