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
        Schema::create('master_golongan_darah', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id dengan auto-increment
            $table->string('golongan_darah', 100); // Kolom golongan_darah
            $table->text('remark')->nullable(); // Kolom remark
            $table->string('created_by', 20)->nullable(); // Kolom created_by
            $table->string('update_by', 20)->nullable(); // Kolom update_by
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_golongan_darah');
    }
};
