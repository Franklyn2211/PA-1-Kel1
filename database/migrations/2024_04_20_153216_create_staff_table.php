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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('id_staff')->primary();
            $table->string('name');
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->date('date_of_birth');
            $table->string('photo')->nullable();
            $table->date('date_joined');
            $table->enum('job_title', ['Ketua Yayasan','Pengajar','Staff']);
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
        Schema::dropIfExists('staff');
    }
};
