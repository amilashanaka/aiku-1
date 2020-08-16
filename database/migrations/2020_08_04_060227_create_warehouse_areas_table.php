<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_areas', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedSmallInteger('tenant_id');
            $table->unsignedMediumInteger('warehouse_id');
            $table->string('slug');
            $table->string('name');
            $table->json('settings');
            $table->json('data');
            $table->timestampsTz();
            $table->unsignedMediumInteger('legacy_id')->nullable();
            $table->index(['tenant_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warehouse_areas');
    }
}
