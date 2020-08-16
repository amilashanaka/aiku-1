<?php
/*
Author: Raul A Perusquía-Flores (raul@inikoo.com)
Created:  Fri Aug 07 2020 21:01:10 GMT+0800 (Malaysia Time) Kuala Lumpur, Malaysia
Copyright (c) 2020,  AIku.io

Version 4
*/


use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedSmallInteger('employee_id');
            $table->unsignedSmallInteger('dates');
            $table->date('date');
            $table->enum('status',['Working','Holiday','SickDay'])->default('Working');
            $table->json('data');
            $table->timestampsTz();
            $table->unsignedMediumInteger('legacy_id')->nullable();
            $table->index(['employee_id', 'date']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
}
