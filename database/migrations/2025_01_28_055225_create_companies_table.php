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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('regno')->nullable();
            $table->string('regdate')->nullable();
            $table->string('pan')->nullable();
            $table->string('panregdate')->nullable();
            $table->enum('vat_pan', ['vat', 'pan'])->nullable();
            $table->string('tole')->nullable();
            $table->string('municipality')->nullable();
            $table->string('ward')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('phone')->nullable();
            $table->string('oemail')->nullable();
            $table->string('accno')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bankbranch')->nullable();
            $table->string('signature')->nullable();
            $table->string('created')->nullable();
            $table->string('cid')->nullable();
            $table->string('cpassword')->nullable();
            $table->string('rid')->nullable();
            $table->string('rpassword')->nullable();
            $table->string('remail')->nullable();
            $table->string('rphone')->nullable();
            $table->enum('location', ['kathmandu', 'butwal','itahari'])->nullable();
            $table->string('pid')->nullable();
            $table->string('ppassword')->nullable();
            $table->string('rcontactperson')->nullable();
            $table->boolean('copystep2data')->default(false);
            $table->string('houseownername')->nullable();
            $table->string('hophone')->nullable();
            $table->string('hopan')->nullable();
            $table->string('hotole')->nullable();
            $table->string('homunicipality')->nullable();
            $table->string('howard')->nullable();
            $table->string('hodistrict')->nullable();
            $table->string('hoprovince')->nullable();
            $table->string('holalpurja')->nullable();
            $table->string('hotiro')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
