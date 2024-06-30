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
        Schema::create('oder_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ProductID');
            $table->unsignedInteger('OrderID');
            $table->integer('Amount');
            $table->text('Note');
            // $table->timestamps();
            $table->foreign('ProductID')->references('ProductID')->on('products');
            $table->foreign('OrderID')->references('OrderID')->on('oders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oder_details');
    }
};
