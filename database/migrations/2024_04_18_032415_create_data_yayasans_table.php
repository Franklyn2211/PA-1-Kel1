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
        Schema::create('data_yayasans', function (Blueprint $table) {
            $table->string('id_data_yayasans')->primary();
            $table->string('nama_yayasan', 40)->nullable(true);
            $table->string('singkatan_nama_yayasan', 20)->nullable(true);
            $table->text('sejarah');
            $table->text('visi');
            $table->text('misi');
            $table->string('logo_yayasan', 100)->nullable(true);
            $table->string('created_by', 20)->default('adminYPA');
            $table->string('updated_by', 20)->nullable(true);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_yayasans');
    }
};
