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
        Schema::create('news_categories', function (Blueprint $table) {
            $table->string('id_news_categories')->primary();
            $table->string('Name');
            $table->text('Description');
            $table->timestamps();
            $table->string('Created_by', 20)->default('adminYPA');
            $table->string('Updated_by', 20)->nullable();
            $table->boolean('Active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_categories');
    }
};
