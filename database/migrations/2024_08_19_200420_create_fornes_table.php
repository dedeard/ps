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
        Schema::create('fornes', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat')->nullable(); // Nullable and default null
            $table->string('kelas_terapi')->nullable();
            $table->string('sub_kelas_terapi')->nullable();
            $table->string('kekuatan')->nullable();
            $table->string('satuan')->nullable();
            $table->string('sediaan')->nullable();
            $table->string('tingkat_faskes')->nullable();
            $table->string('oen')->nullable();
            $table->string('program_p')->nullable();
            $table->string('kanker_ca')->nullable();
            $table->text('restriksi_obat')->nullable();
            $table->text('restriksi_sediaan')->nullable();
            $table->text('restriksi_kelas_terapi')->nullable();
            $table->text('restriksi_sub_kelas_terapi')->nullable();
            $table->text('restriksi_sub_sub_kelas_terapi')->nullable();
            $table->text('restriksi_sub_sub_sub_kelas_terapi')->nullable();
            $table->text('peresepan_maksimal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornes');
    }
};
