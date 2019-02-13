<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcheteProduitUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achete_produit_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('produits_id')->foreign('produits_id')->references('id')->on('produits')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');

            $table->integer('user_id')->foreign('user_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achete_produit_user', function(Blueprint $table) {
            $table->dropForeign('achete_produit_user_produits_id_foreign');
            $table->dropForeign('achete_produit_user_user_id_foreign');
        });

        Schema::dropIfExists('achete_produit_user');
    }
}
