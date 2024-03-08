<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('Cni')->unique();
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('email');
            $table->string('telephone');
            $table->string('qrcode');
            $table->string('horaire');
            $table->integer('salaire');
            $table->integer('cjm');
            $table->boolean('isAdmin');
            $table->timestamps();
        });

        // Ajouter la clé étrangère pour les paiements
        Schema::table('employees', function (Blueprint $table) {
            $table->foreignId('paiement_id')->nullable()->constrained('paiements')->onDelete('SET NULL');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
