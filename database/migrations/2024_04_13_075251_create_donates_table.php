<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->string('id_donate')->primary();
            $table->string('Name');
            $table->string('Email');
            $table->string('Phone_number');
            $table->string('asaldaerah');
            $table->decimal('donation_amount', 15, 2);
            $table->binary('evidence_of_transfer')->nullable();
            $table->text('Description');
            $table->string('created_by', 20)->default('adminYPA');
            $table->string('updated_by', 20)->nullable(true);
            $table->boolean('Active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donates');
    }
};
