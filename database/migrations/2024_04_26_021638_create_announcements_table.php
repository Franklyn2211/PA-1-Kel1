<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\Type\VoidType;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->string('id_announcements')->primary();
            $table->string('title');
            $table->string('photo')->nullable();
            $table->string('location');
            $table->string('announcement_category_id');
            $table->foreign('announcement_category_id')->references('id_announcement_categories')->on('announcement_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('description');
            $table->string('created_by', 20)->default('adminYPA');
            $table->string('updated_by', 20)->nullable(true);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
