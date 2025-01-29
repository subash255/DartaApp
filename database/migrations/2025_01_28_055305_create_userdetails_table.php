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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('wname')->nullable();

            $table->string('email')->unique();
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
            $table->string('citizennumber')->nullable();
            $table->string('issuedate')->nullable();
            $table->string('issuedplace')->nullable();
            $table->string('notarized')->nullable();
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('spousename')->nullable();
            $table->string('grandfathername')->nullable();
            $table->string('phone')->nullable();
            $table->string('optemail')->nullable();
            $table->string('pan')->nullable();
            $table->string('nid')->nullable();
            $table->string('lawyername')->nullable();
            $table->string('lawyerphone')->nullable();
            $table->string('lawyerid')->nullable();
            $table->string('lawyeridvalid')->nullable();
            $table->string('shareamt')->nullable();
            $table->string('shareno')->nullable();
            $table->string('sharefrom')->nullable();
            $table->string('shareto')->nullable();
            $table->string('sharedate')->nullable();
            $table->string('totalshare')->nullable();
            $table->string('addshare')->nullable();
            $table->string('salesofshare')->nullable();
            $table->string('accno')->nullable();
            $table->string('bankname')->nullable();
            $table->string('bankbranch')->nullable();




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
