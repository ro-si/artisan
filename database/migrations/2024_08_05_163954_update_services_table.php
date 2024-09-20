<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Supprimer la clé étrangère existante
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Modifier la clé étrangère pour faire référence à la table 'prestataires'
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('prestataires')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer la clé étrangère modifiée
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Recréer la clé étrangère pour faire référence à la table 'users'
        Schema::table('services', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }
};
