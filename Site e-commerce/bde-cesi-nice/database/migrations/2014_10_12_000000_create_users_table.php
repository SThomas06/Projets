<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('firstname');
            $table->string('email', 50);
            $table->unique('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('campus_user', ['', 'Sophia Antipolis','Aix-en-provence','Montpellier','Toulouse','Pau','Bordeaux','Grenoble','Lyon','Dijon','La Rochelle','Angoulême','Orléans','Le Mans', 'Saint-Nazaire', 'Nantes', 'Brest', 'Caen', 'Rouen', 'Paris Nanterre', 'Reims', 'Arras', 'Lille', 'Nancy', 'Strasbourg'])->default('');
            $table->boolean('d_etudiant_user')->default(false);
            $table->boolean('d_bde_user')->default(false);
            $table->boolean('d_salarie_user')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
