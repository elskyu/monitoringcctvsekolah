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
        Schema::create('panorama', function (Blueprint $table) {
            $table->id();
            $table->string('namaWilayah');
            $table->string('namaTitik')->nullable();
            $table->string('link');
            $table->string('status')->default('offline');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panorama');
    }
};
