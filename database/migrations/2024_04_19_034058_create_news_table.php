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
        Schema::create('news', function (Blueprint $table) {
        $table->string('id_news')->primary();
        $table->string('title');
        $table->string('location');
        $table->date('tanggal');
        $table->string('photo')->nullable();
        $table->string('news_category_id'); // Kolom news_category_id yang benar
        $table->foreign('news_category_id')->references('id_news_categories')->on('news_categories')->cascadeOnUpdate()->cascadeOnDelete();
        $table->text('description');
        $table->string('created_by', 20)->default('adminYPA');
        $table->string('updated_by', 20)->nullable();
        $table->boolean('active')->default(true);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
