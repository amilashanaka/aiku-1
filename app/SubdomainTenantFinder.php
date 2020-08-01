<?php
/*
Author: Raul A Perusquía-Flores (raul@inikoo.com)
Created:  Sat Aug 01 2020 22:58:20 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia
Copyright (c) 2020,  AIku.io

Version 4
*/


namespace App;

use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Concerns\UsesTenantModel;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\TenantFinder\TenantFinder;

class SubdomainTenantFinder extends TenantFinder
{
    use UsesTenantModel;

    public function findForRequest(Request $request):?Tenant
    {

        list($subdomain) = explode('.', $request->getHost(), 2);


        return $this->getTenantModel()::where('subdomain', $subdomain)->first();



    }
}
