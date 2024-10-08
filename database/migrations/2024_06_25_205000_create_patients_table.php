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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doctor_id')->after('user_id')->constrained()->onDelete('cascade');

            $table->string('nik');
            $table->string('bpjs_number')->nullable();
            $table->string('full_name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->enum('blood_type', ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']);
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('verified')->default(false);
            $table->integer('status')->default(1);
            $table->string('notes')->nullable()->after('phone');
            $table->string('recipe')->nullable()->after('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
