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
          $table->string('cin')->unique()->nullable();
          $table->string('prenom')->nullable();
          $table->string('numTel')->nullable();
          $table->timestamp('dateNaissance')->nullable(); // Change to nullable if no default value is intended
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('cin');
          $table->dropColumn('prenom');
          $table->dropColumn('numTel');
          $table->dropColumn('dateNaissance');
        });
    }
};
