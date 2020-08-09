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
 * App\Models\CRM\Prospect
 *
 * @property-read \App\Models\Stores\Store $store
 * @method static Builder|Prospect newModelQuery()
 * @method static Builder|Prospect newQuery()
 * @method static Builder|Prospect query()
 * @mixin \Eloquent
 */
class Prospect extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Stores\Store');
    }
}
