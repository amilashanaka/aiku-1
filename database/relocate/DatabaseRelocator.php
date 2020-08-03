<?php

use Illuminate\Database\Seeder;
use Spatie\Multitenancy\Models\Tenant as Tenanto;
class DatabaseRelocator extends Seeder
{


    public function run()
    {
        Tenanto::checkCurrent()
            ? $this->runTenantSpecificRelocators()
            : $this->runLandlordSpecificRelocators();
    }

    public function runTenantSpecificRelocators()
    {
        $this->call(EmployeeRelocator::class);
        $this->call(UserRelocator::class);

    }

    public function runLandlordSpecificRelocators()
    {
        $this->call(TenantRelocator::class);
    }


}
