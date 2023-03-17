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
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->after('name');
            $table->string('phone')->after('email');
            $table->string('address')->after('phone');
            $table->string('cin')->after('address');
            $table->string('num_emp')->after('cin');
            $table->string('ville')->after('num_emp');
            $table->string('codepostal')->after('ville');
            $table->string('date_naiss')->after('codepostal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('prenom');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('cin');
             $table->dropColumn('num_emp');
             $table->dropColumn('ville');
             $table->dropColumn('codepostal');
             $table->dropColumn('date_naiss');
        });

    }
};
