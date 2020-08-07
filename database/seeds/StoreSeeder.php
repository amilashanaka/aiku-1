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

                $store->inmutable_addresses()->saveMany(
                    factory(App\InmutableAddress::class, 5)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                );

                $store->inmutable_products()->saveMany(
                    factory(App\InmutableProduct::class, 5)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                );

                $store->store_aggregations()->saveMany(
                    factory(App\StoreAggregation::class, 1)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                );

                $store->products()->saveMany(
                    factory(App\Product::class, 5)->make(
                        [
                            'tenant_id' => $store->tenant_id
                        ]
                    )
                )->each(
                    function ($product) {


                        $product->parts()->saveMany(
                            factory(App\Part::class, 10)->make(
                                [
                                    'tenant_id' => $product->tenant_id
                                ]
                            )
                        );
 
                    }
                );


               
                $store->charges()->saveMany(
                    factory(App\Charge::class, 5)->make(
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
                        )->each(
                            function ($webpage) {
        
        
                                $webpage->web_blocks()->saveMany(
                                    factory(App\WebBlock::class, 10)->make(
                                        [
                                            'tenant_id' => $webpage->tenant_id
                                        ]
                                    )
                                );
        
                            }
                        );



                        $website->web_users()->saveMany(
                            factory(App\WebUser::class, 10)->make(
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
