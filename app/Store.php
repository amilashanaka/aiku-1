<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Store extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function prospects()
    {
        return $this->hasMany('App\Prospect');
    }

    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

  

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

    public function websites()
    {
        return $this->hasOne('App\Website');
    }

    public function charges()
    {
        return $this->hasMany('App\Charge');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function inmutable_addresses()
    {
        return $this->hasMany('App\InmutableAddress');
    }

    public function inmutable_products()
    {
        return $this->hasMany('App\InmutableProduct');
    }

    public function store_aggregations()
    {
        return $this->hasOne('App\StoreAggregation');
    }

    
}
