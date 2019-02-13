<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {

            $table->increments('id');
            $table->string('description_commentaire');
            $table->date('date_commentaire');
            $table->string('auteur_commentaire');
            $table->integer('photos_id')->foreign('photos_id')
                  ->references('id')
                  ->on('photos')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
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
        Schema::table('commentaires', function(Blueprint $table) {
            $table->dropForeign('commentaires_photos_id_foreign');
        });

        Schema::dropIfExists('commentaires');
    }
}
