<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteEvenementUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_evenement_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('evenements_id')->foreign('evenements_id')->references('id')->on('evenements')
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
        Schema::table('vote_evenement_user', function(Blueprint $table) {
            $table->dropForeign('vote_evenement_user_evenements_id_foreign');
            $table->dropForeign('vote_evenement_user_user_id_foreign');
        });

        Schema::dropIfExists('vote_evenement_user');
    }
}
