<?php
/*
Copyright (c) 2020, AIku.io

Version 4
*/

namespace App\Models\CRM;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\CRM\Customer
 *
 * @property-read \App\Models\Stores\Store $store
 * @method static Builder|Customer newModelQuery()
 * @method static Builder|Customer newQuery()
 * @method static Builder|Customer query()
 * @mixin \Eloquent
 */
class Customer extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }


}
