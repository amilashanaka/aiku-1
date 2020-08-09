<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\Distribution;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Distribution\DeliveryNote
 *
 * @property-read \App\Models\Sales\Order $order
 * @property-read \App\Models\Stores\Store $store
 * @method static Builder|DeliveryNote newModelQuery()
 * @method static Builder|DeliveryNote newQuery()
 * @method static Builder|DeliveryNote query()
 * @mixin \Eloquent
 */
class DeliveryNote extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Sales\Order');
    }
}
