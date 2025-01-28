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
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ctole')->nullable();
            $table->string('cmunicipality')->nullable();
            $table->string('cward')->nullable();
            $table->string('cdistrict')->nullable();
            $table->string('cprovince')->nullable();
            $table->string('cctole')->nullable();
            $table->string('ccmunicipality')->nullable();
            $table->string('ccward')->nullable();
            $table->string('ccdistrict')->nullable();
            $table->string('ccprovince')->nullable();
            $table->string('ttole')->nullable();
            $table->string('tmunicipality')->nullable();
            $table->string('tward')->nullable();
            $table->string('tdistrict')->nullable();
            $table->string('tprovince')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdetails');
    }
};
