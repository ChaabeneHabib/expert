<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
      Schema::table('examens', function (Blueprint $table) {
        $table->renameColumn('typeE', 'type');
      


      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('examens', function (Blueprint $table) {
        $table->string('type')->nullable('false')->change();
    });
}

};
