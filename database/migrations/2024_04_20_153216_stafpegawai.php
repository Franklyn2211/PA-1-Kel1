<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stafpegawai', function (Blueprint $table) {
            $table->string('id_stafpegawai')->primary();
            $table->string('nama');
            $table->integer('umur');
            $table->date('tanggal_bergabung');
            $table->string('jabatan');
            $table->timestamps();
            $table->string('created_by', 20)->default('adminYPA');
            $table->string('updated_by', 20)->nullable(true);
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
        Schema::dropIfExists('stafpegawai');
    }
};
