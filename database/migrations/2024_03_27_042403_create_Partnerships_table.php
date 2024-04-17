<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 50);
            $table->string('Logo', 150);
            $table->string('Program', 255);
            $table->string('Created_by', 20)->default('adminYPA');
            $table->string('Updated_by', 20)->nullable();
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
        Schema::dropIfExists('Partnerships');
    }
};
