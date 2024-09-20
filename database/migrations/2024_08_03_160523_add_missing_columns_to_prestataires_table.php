<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToPrestatairesTable extends Migration
{
    public function up()
    {
        Schema::table('prestataires', function (Blueprint $table) {
            if (!Schema::hasColumn('prestataires', 'nom')) {
                $table->string('nom')->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'prenom')) {
                $table->string('prenom')->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'situation_geographique')) {
                $table->string('situation_geographique')->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'numero_mobile')) {
                $table->string('numero_mobile')->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'secteur_activite')) {
                $table->string('secteur_activite')->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'email')) {
                $table->string('email')->unique()->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'password')) {
                $table->string('password')->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'latitude')) {
                $table->decimal('latitude', 10, 7)->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'longitude')) {
                $table->decimal('longitude', 10, 7)->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'plage_horaire')) {
                $table->string('plage_horaire')->nullable();
            }

            if (!Schema::hasColumn('prestataires', 'ville')) {
                $table->string('ville')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('prestataires', function (Blueprint $table) {
            if (Schema::hasColumn('prestataires', 'nom')) {
                $table->dropColumn('nom');
            }

            if (Schema::hasColumn('prestataires', 'prenom')) {
                $table->dropColumn('prenom');
            }

            if (Schema::hasColumn('prestataires', 'situation_geographique')) {
                $table->dropColumn('situation_geographique');
            }

            if (Schema::hasColumn('prestataires', 'numero_mobile')) {
                $table->dropColumn('numero_mobile');
            }

            if (Schema::hasColumn('prestataires', 'secteur_activite')) {
                $table->dropColumn('secteur_activite');
            }

            if (Schema::hasColumn('prestataires', 'email')) {
                $table->dropColumn('email');
            }

            if (Schema::hasColumn('prestataires', 'password')) {
                $table->dropColumn('password');
            }

            if (Schema::hasColumn('prestataires', 'latitude')) {
                $table->dropColumn('latitude');
            }

            if (Schema::hasColumn('prestataires', 'longitude')) {
                $table->dropColumn('longitude');
            }

            if (Schema::hasColumn('prestataires', 'plage_horaire')) {
                $table->dropColumn('plage_horaire');
            }

            if (Schema::hasColumn('prestataires', 'ville')) {
                $table->dropColumn('ville');
            }
        });
    }
}
