<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumSong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('album_song', function (Blueprint $table) {
            $table->integer('album_id')->unsigned();
            $table->foreign('album_id')->references('album_id')->on('albums');
            $table->integer('song_id')->unsigned();
            $table->foreign('song_id')->references('song_id')->on('songs');
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
        Schema::dropIfExists('album_song');
    }
}
