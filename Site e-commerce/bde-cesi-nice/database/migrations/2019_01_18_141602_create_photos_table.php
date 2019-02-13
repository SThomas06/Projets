<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_photo');
            $table->string('url_photo');
            $table->integer('evenements_id')->foreign('evenements_id')
                  ->references('id')
                  ->on('evenements')
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
        Schema::table('photos', function(Blueprint $table) {
            $table->dropForeign('photos_evenements_id_foreign');
        });

        Schema::dropIfExists('photos');
    }
}
