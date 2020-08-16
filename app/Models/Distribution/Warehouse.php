<?php

namespace App\Models\Distribution;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Distribution\Warehouse
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Distribution\WarehouseArea[] $areas
 * @property-read int|null $areas_count
 * @method static Builder|Warehouse newModelQuery()
 * @method static Builder|Warehouse newQuery()
 * @method static Builder|Warehouse query()
 * @mixin \Eloquent
 */
class Warehouse extends Model {

    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function areas() {
        return $this->hasMany('App\Models\Distribution\WarehouseArea');
    }


}
