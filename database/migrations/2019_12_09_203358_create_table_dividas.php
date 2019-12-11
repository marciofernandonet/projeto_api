<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDividas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dividas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('devedores_id')->unsigned();
            $table->foreign('devedores_id')->references('id')->on('devedores')->onDelete('cascade');
            $table->string('desc_titulo');
            $table->float('valor', 5, 2);
            $table->date('data_vencimento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dividas');
    }
}
