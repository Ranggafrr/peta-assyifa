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
        Schema::create('master_menu', function (Blueprint $table) {
            $table->id();
            $table->string('kode_menu', 30)->unique();
            $table->string('modul', 30);
            $table->string('nama_menu', 100);
            $table->string('sub_menu', 50)->default('N');
            $table->string('route', 100)->nullable();
            $table->string('created_by', 50);
            $table->string('updated_by', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_menu');
    }
};
