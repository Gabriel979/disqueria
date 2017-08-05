<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('album_id');
            $table->integer('artista_id')->unsigned();
            $table->foreign('artista_id')->references('artista_id')->on('artistas')->onDelete('cascade');
            $table->integer('id_genero')->unsigned();
            $table->foreign('id_genero')->references('id_genero_musical')->on('genero_musical');
            $table->string('nombre_album',100);
            $table->string('imagen_album',100);
            $table->date('fecha_salida');
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
        Schema::dropIfExists('albums');
    }
}
