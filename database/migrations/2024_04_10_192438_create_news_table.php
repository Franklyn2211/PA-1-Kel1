<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('News', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Slug')->unique();
            $table->string('Location');
            $table->date('tanggal');
            $table->string('photo');
            $table->foreignId('News_category_id')->constrained('News_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('Is_Share');
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
        Schema::dropIfExists('News');
    }
}
;
