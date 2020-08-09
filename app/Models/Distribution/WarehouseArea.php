<?php

namespace App\Models\Distribution;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

/**
 * App\Models\Distribution\WarehouseArea
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Distribution\Location[] $locations
 * @property-read int|null $locations_count
 * @property-read \App\Models\Distribution\Warehouse $warehouse
 * @method static Builder|WarehouseArea newModelQuery()
 * @method static Builder|WarehouseArea newQuery()
 * @method static Builder|WarehouseArea query()
 * @mixin \Eloquent
 */
class WarehouseArea extends Model
{

    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Distribution\Warehouse');
    }

    public function locations()
    {
        return $this->hasMany('App\Models\Distribution\Location');
    }

}
