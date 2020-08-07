<?php
/*
Author: Raul A Perusquía-Flores (raul@inikoo.com)
Created:  Fri Aug 07 2020 21:43:29 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia 
Copyright (c) 2020,  AIku.io

Version 4
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class TimesheetRecord extends Model {
    use UsesTenantConnection;

    protected $casts = [
        'settings' => 'array',
        'data'     => 'array'
    ];

    public function timesheet()
    {
        return $this->belongsTo('App\Timesheet');
    }
}
