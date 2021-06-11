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
            $table->integer('detento_id');
            $table->integer('oficina_id');
            $table->string('description');
            $table->integer('orderServices_id');
            $table->decimal('valorDetento');
            $table->decimal('valorOficina');
            $table->string('status');
            $table->softDeletes($column ='delete_at', $precision=0);
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
