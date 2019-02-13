<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_produit');
            $table->string('description_produit');
            $table->dateTime('date_produit');
            $table->integer('quantite_produit');
            $table->integer('prix_produit');
            $table->integer('compteur_produit')->default(0);
            $table->integer('categories_id')->foreign('categories_id')
                  ->references('id')
                  ->on('categories')
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
        Schema::table('produits', function(Blueprint $table) {
            $table->dropForeign('produits_categories_id_foreign');
        });

        Schema::dropIfExists('produits');
    }
}
