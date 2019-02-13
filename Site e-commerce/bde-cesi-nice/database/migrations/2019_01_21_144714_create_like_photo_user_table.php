<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikePhotoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_photo_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('photos_id')->foreign('photos_id')->references('id')->on('photos')
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
        Schema::table('like_photo_user', function(Blueprint $table) {
            $table->dropForeign('like_photo_user_photos_id_foreign');
            $table->dropForeign('like_photo_user_user_id_foreign');
        });

        Schema::dropIfExists('like_photo_user');
    }
}
