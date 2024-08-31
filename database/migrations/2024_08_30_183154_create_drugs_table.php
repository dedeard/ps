<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table for therapeutic classes (kelas terapi)
        Schema::create('therapeutic_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name from kelasTerapi

        });

        // Sublevel 1 (sub1)
        Schema::create('therapeutic_sub1', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // name from sub1
            $table->foreignId('therapeutic_class_id')
                ->nullable()
                ->constrained('therapeutic_classes')
                ->onDelete('set null'); // Foreign key to therapeutic_classes

        });

        // Sublevel 2 (sub2)
        Schema::create('therapeutic_sub2', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // name from sub2
            $table->foreignId('sub1_id')
                ->nullable()
                ->constrained('therapeutic_sub1')
                ->onDelete('set null'); // Foreign key to sub1

        });

        // Sublevel 3 (sub3)
        Schema::create('therapeutic_sub3', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // name from sub3
            $table->foreignId('sub2_id')
                ->nullable()
                ->constrained('therapeutic_sub2')
                ->onDelete('set null'); // Foreign key to sub2

        });

        // Main table for storing drugs
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Drug name (namaObat)

            // Polymorphic relation to any therapeutic class or subclass
            $table->nullableMorphs('therapeutic'); // morphable columns therapeutic_type and therapeutic_id


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
        Schema::dropIfExists('therapeutic_sub3');
        Schema::dropIfExists('therapeutic_sub2');
        Schema::dropIfExists('therapeutic_sub1');
        Schema::dropIfExists('therapeutic_classes');
    }
};
