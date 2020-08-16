<?php
/*
Author: Raul A Perusquía-Flores (raul@inikoo.com)
Created:  Fri Aug 07 2020 21:05:10 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia
Copyright (c) 2020,  AIku.io

Version 4
*/

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\Helpers\Date
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HR\Timesheet[] $timesheets
 * @property-read int|null $timesheets_count
 * @method static Builder|Date newModelQuery()
 * @method static Builder|Date newQuery()
 * @method static Builder|Date query()
 * @mixin \Eloquent
 */
class Date extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function timesheets()
    {
        return $this->hasMany('App\Models\HR\Timesheet');
    }

}
