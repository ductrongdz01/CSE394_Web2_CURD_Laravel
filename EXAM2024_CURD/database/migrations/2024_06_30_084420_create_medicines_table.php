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
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('MedicineID');
            $table->string('Name', 255);
            $table->string('Brand', 255);
            $table->string('Dosage', 50);
            $table->string('Form', 50);
            $table->decimal('Price', 10, 2);
            $table->integer('Stock');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
