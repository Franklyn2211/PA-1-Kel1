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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location');
            $table->date('tanggal');
            $table->string('photo');
            $table->unsignedBigInteger('news_category_id'); // Kolom news_category_id yang benar
            $table->foreign('news_category_id')->references('id')->on('news_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('is_share');
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
