<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('News_categories', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Slug')->unique();
            $table->text('Description');
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
        Schema::dropIfExists('News_categories');
    }
};
