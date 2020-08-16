<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\Stores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Stores\Store
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sales\Charge[] $charges
 * @property-read int|null $charges_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CRM\Customer[] $customers
 * @property-read int|null $customers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sales\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sales\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Stores\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CRM\Prospect[] $prospects
 * @property-read int|null $prospects_count
 * @property-read \App\Models\Stores\StoreAggregation|null $store_aggregation
 * @property-read \App\Models\ECommerce\Website|null $websites
 * @method static Builder|Store newModelQuery()
 * @method static Builder|Store newQuery()
 * @method static Builder|Store query()
 * @mixin \Eloquent
 */
class Store extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function prospects()
    {
        return $this->hasMany('App\Models\CRM\Prospect');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Sales\Invoice');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Sales\Order');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\CRM\Customer');
    }

    public function websites()
    {
        return $this->hasOne('App\Models\ECommerce\Website');
    }

    public function charges()
    {
        return $this->hasMany('App\Models\Sales\Charge');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Stores\Product');
    }

    public function store_aggregation()
    {
        return $this->hasOne('App\Models\Stores\StoreAggregation');
    }


}
