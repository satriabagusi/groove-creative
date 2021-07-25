<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplyLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_ledgers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ledgers_id');
            $table->unsignedBigInteger('supply_id');
            $table->timestamps();

            $table->foreign('ledgers_id')->references('id')->on('ledgers');
            $table->foreign('supply_id')->references('id')->on('supplies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supply_ledgers');
    }
}
