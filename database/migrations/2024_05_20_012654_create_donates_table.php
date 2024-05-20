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
        Schema::create('donates', function (Blueprint $table) {
            $table->string('id_donate')->primary();
            $table->string('Name');
            $table->string('Email');
            $table->string('Phone_number');
            $table->string('origin');
            $table->decimal('donation_amount', 15, 2)->nullable();
            $table->string('evidence_of_transfer')->nullable();
            $table->text('Description');
            $table->string('category'); // Field to differentiate between money and goods donations
            $table->string('goods_name')->nullable(); // Name of the goods donated
            $table->integer('goods_quantity')->nullable(); // Quantity of the goods donated
            $table->string('created_by', 20)->default('adminYPA');
            $table->string('updated_by', 20)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donates');
    }
};
