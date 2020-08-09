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
 * App\Models\Sales\Order
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Distribution\DeliveryNote[] $delivery_notes
 * @property-read int|null $delivery_notes_count
 * @property-read \App\Models\Sales\Invoice|null $invoice
 * @property-read \App\Models\Stores\Store $store
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @mixin \Eloquent
 */
class Order extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }

    public function invoice()
    {
        return $this->hasOne('App\Models\Sales\Invoice');
    }
    public function delivery_notes()
    {
        return $this->hasMany('App\Models\Distribution\DeliveryNote');
    }
}
