<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Sales\Invoice
 *
 * @property-read \App\Models\Sales\Order $order
 * @method static Builder|Invoice newModelQuery()
 * @method static Builder|Invoice newQuery()
 * @method static Builder|Invoice query()
 * @mixin \Eloquent
 */
class Invoice extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Sales\Order');
    }



}
