<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('detento_id')->nullable();
            $table->integer('oficina_id')->nullable();
            $table->string('description')->nullable();
            $table->integer('orderServices_id')->nullable();
            $table->decimal('valorDetento')->nullable();
            $table->decimal('valorOficina')->nullable();
            $table->decimal('valor')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('transacoes');
    }
}
