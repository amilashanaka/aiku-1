<?php
/*
Author: Raul A Perusquía-Flores (raul@inikoo.com)
Created:  Fri Aug 07 2020 21:43:29 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia
Copyright (c) 2020,  AIku.io

Version 4
*/

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\HR\TimesheetRecord
 *
 * @property-read \App\Models\HR\Timesheet $timesheet
 * @method static Builder|TimesheetRecord newModelQuery()
 * @method static Builder|TimesheetRecord newQuery()
 * @method static Builder|TimesheetRecord query()
 * @mixin \Eloquent
 */
class TimesheetRecord extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];

    public function timesheet() {
        return $this->belongsTo('App\Models\HR\Timesheet');
    }
}
