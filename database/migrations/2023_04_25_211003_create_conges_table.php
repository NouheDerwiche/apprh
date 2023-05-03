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
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['en attente', 'accepte', 'refuse']);
            $table->enum('type_conge', ['conge malade', 'conge maternite', 'conge solde', 'conge non solde']);
            $table->date('date_debut');
            $table->date('date_fin');
            $table->float('solde_conge_annuel')->default(12);
            $table->float('solde_conge_mensuel')->default(1.5);

            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conges');
    }
};
