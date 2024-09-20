<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestatairesTable extends Migration
{
    public function up()
    {
        Schema::create('prestataires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('situation_geographique');
            $table->string('numero_mobile');
            $table->string('secteur_activite');
            $table->string('email')->unique();
            $table->string('password');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('plage_horaire');
            $table->string('ville');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestataires');
    }
}
