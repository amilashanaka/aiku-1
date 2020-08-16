<?php

namespace App\Models\Distribution;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Distribution\Location
 *
 * @property-read \App\Models\Distribution\WarehouseArea $area
 * @property-read \App\Models\Distribution\Warehouse $warehouse
 * @method static Builder|Location newModelQuery()
 * @method static Builder|Location newQuery()
 * @method static Builder|Location query()
 * @mixin \Eloquent
 */
class Location extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function warehouse() {
        return $this->belongsTo('App\Models\Distribution\Warehouse');
    }

    public function area() {
        return $this->belongsTo('App\Models\Distribution\WarehouseArea');
    }


}
