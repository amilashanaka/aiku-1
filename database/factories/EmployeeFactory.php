<?php
/*
Author: Raul A Perusquía-Flores (raul@inikoo.com)
Created:  Mon Aug 03 2020 09:46:51 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia
Copyright (c) 2020,  AIku.io

Version 4
*/


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HR\Employee;
use Faker\Generator as Faker;


$factory->define(
    Employee::class, function (Faker $faker, $tenant_id) {


    return [
        'tenant_id' => $tenant_id,
        'name'      => $faker->name,
        'status'    => 'Working'

    ];
}
);
