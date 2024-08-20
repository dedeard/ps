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
        Schema::table('patients', function (Blueprint $table) {
            $table->text('kelas_terapi')->nullable();
            $table->text('sub_kelas_terapi')->nullable();
            $table->text('sub_sub_kelas_terapi')->nullable();
            $table->text('sub_sub_sub_kelas_terapi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('kelas_terapi');
            $table->dropColumn('sub_kelas_terapi');
            $table->dropColumn('sub_sub_kelas_terapi');
            $table->dropColumn('sub_sub_sub_kelas_terapi');
        });
    }
};
