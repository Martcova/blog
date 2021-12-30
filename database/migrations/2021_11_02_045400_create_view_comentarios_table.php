<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create view view_comentarios as
        select c.id, c.comentario, c.user_id, u.name as autor, c.articulo_id, a.nombre, a.user_id as prop_art, c.estado, a.created_at
        from comentarios c
        inner join users u
        on c.user_id = u.id
        inner join articulos a
        on c.articulo_id = a.id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_comentarios');
    }
}
