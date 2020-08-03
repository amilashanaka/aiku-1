<?php
/*
Author: Raul Perusquia (raul@inikoo.com)
Created:  Mon Jul 27 2020 18:25:03 GMT+0800 (Malaysia Time) Tioman, Malaysia
Copyright (c) 2020, AIku.io

Version 4
*/

use Illuminate\Database\Seeder;


class EmployeeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {


        $tenant = app('currentTenant');


        factory(App\Employee::class, rand(10, 20))->create(
            [
                'tenant_id' => $tenant->id,
            ]
        )->each(
            function ($employee) {

                $parent_class=(new \ReflectionClass($employee))->getShortName();

                $employee->user()->save(
                    factory(App\User::class)->make(
                        [
                            'tenant_id'        => $employee->tenant_id,
                            'handle'        => $employee->slug,
                            'userable_id'   => $employee->id,
                            'userable_type' => $parent_class
                        ]
                    )
                );


            }
        );

    }


}
