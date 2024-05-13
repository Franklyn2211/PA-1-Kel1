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
        Schema::create('footer', function (Blueprint $table) {
            $table->string('id_footer')->primary();
            $table->text('about');
            $table->string('phone_number');
            $table->string('email');
            $table->string('facebook_url');
            $table->string('instagram_url');
            $table->string('youtube_url');
            $table->string('tiktok_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer');
    }
};
