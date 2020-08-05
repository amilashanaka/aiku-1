<?php

/*
Author: Amila

Copyright (c) 2020, AIku.io

Version 4
*/

use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = app('currentTenant');

        factory(App\Store::class, rand(2, 3))->create(
            [
                'tenant_id' => $tenant->id,
            ]
        )->each(
            function ($store) {


                $store->prospects()->saveMany(
                    factory(App\Prospect::class, 5)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                );

                $store->invoices()->saveMany(
                    factory(App\Invoice::class, 5)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                );


            }


        );


    }


    
}
