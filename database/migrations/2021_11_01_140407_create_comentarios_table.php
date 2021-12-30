<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->text('comentario');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('articulo_id')->unsigned();
            $table->integer('estado')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete("restrict")->
            onUpdate("cascade");
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete("restrict")->
            onUpdate("cascade");
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
        Schema::dropIfExists('comentarios');
    }
}
