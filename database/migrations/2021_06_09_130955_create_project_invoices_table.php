<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice', 25);
            $table->string('order_id');
            $table->bigInteger('total_pay');
            $table->string('payment_method');
            $table->string('bukti_pembayaran')->nullable();
            $table->integer('status');
            $table->integer('invoice_status');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_invoices');
    }
}
