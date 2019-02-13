<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nom_evenement')->nullable();
            $table->string('auteur_evenement')->nullable();
            $table->dateTime('date_debut_evenement')->nullable();
            $table->dateTime('date_fin_evenement')->nullable();
            $table->string('lieu_evenement')->nullable();
            $table->integer('duree_evenement')->nullable();
            $table->float('prix_evenement', 8, 2)->nullable();
            $table->boolean('payant_evenement')->nullable();
            $table->string('description_evenement')->nullable();
            $table->string('description_image_evenement')->nullable();
            $table->string('url_photo')->nullable();
            $table->boolean('recurrence_evenement')->nullable();
            $table->boolean('idee_evenement')->nullable();
            $table->integer('user_id')->foreign('user_id')
                  ->references('id')
                  ->on('users')
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

        Schema::table('evenements', function(Blueprint $table) {
            $table->dropForeign('evenements_user_id_foreign');
        });
        
        Schema::dropIfExists('evenements');
    }
}
