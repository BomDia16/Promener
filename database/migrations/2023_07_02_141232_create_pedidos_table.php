<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('cachorro_id');
            $table->foreignId('passeador_id');
            $table->string('horario');
            $table->string('local');
            $table->string('preco');
            $table->string('status');
            $table->timestamps();

            // foreign ids
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cachorro_id')->references('id')->on('cachorros');
            $table->foreign('passeador_id')->references('id')->on('passeadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
