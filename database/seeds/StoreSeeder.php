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

               
                
                $store->customers()->saveMany(
                    factory(App\Customer::class, 100)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                );

                $store->websites()->saveMany(
                    factory(App\Website::class, 1)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                )->each(
                    function ($website) {


                        $website->webpages()->saveMany(
                            factory(App\Webpage::class, 10)->make(
                                [
                                    'tenant_id' => $website->tenant_id
                                ]
                            )
                        );


                        
                        

                    }
                );


                

                $store->orders()->saveMany(
                    factory(App\Order::class, 5)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                )->each(
                    function ($order) {


                        $order->invoice()->saveMany(
                            factory(App\Invoice::class, 1)->make(
                                [
                                    'tenant_id' => $order->tenant_id
                                ]
                            )
                        );

                        $order->delivery_notes()->saveMany(
                            factory(App\DeliveryNote::class, 5)->make(
                                [
                                    'tenant_id' => $order->tenant_id
                                ]
                            )
                        );

                    }
                );


            }


        );


    }


    
}
