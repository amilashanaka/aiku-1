<?php
/*
Author: Raul A Perusquía-Flores (raul@inikoo.com)
Created:  Fri Aug 07 2020 21:43:17 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia
Copyright (c) 2020,  AIku.io

Version 4
*/

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


/**
 * App\Models\HR\Timesheet
 *
 * @property-read \App\Models\Helpers\Date $date
 * @property-read \App\Models\HR\Employee $employee
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HR\TimesheetRecord[] $timesheet_records
 * @property-read int|null $timesheet_records_count
 * @method static Builder|Timesheet newModelQuery()
 * @method static Builder|Timesheet newQuery()
 * @method static Builder|Timesheet query()
 * @mixin \Eloquent
 */
class Timesheet extends Model {
    use UsesTenantConnection;

        protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    protected $attributes = [
        'data' => '{}',
        'settings' => '{}'
    ];


    public function employee() {
        return $this->belongsTo('App\Models\HR\Employee');
    }

    public function date() {
        return $this->belongsTo('App\Models\Helpers\Date');
    }

    public function timesheet_records() {
        return $this->hasMany('App\Models\HR\TimesheetRecord');
    }
}
