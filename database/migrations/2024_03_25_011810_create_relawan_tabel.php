<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('relawan', function (Blueprint $table) {
            $table->string('id_relawan')->primary();
            $table->string('nama_relawan');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->date('tanggallahir');
            $table->enum('lokasi', ['Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba', 'Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah']);
            $table->binary('cv')->nullable();
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relawan');
    }
};