 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->string('id_volunteers')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->date('date_of_birth');
            $table->enum('location', ['Wilayah I, Desa Lumban Silintong, Kecamatan Balige, Kabupaten Toba', 'Wilayah II, Desa Sawah Lamo, Kecamatan Andam Dewi, Kabupaten Tapanuli Tengah']);
            $table->binary('cv')->nullable();
            $table->timestamps();
            $table->string('created_by', 20)->default('adminYPA');
            $table->string('updated_by', 20)->nullable(true);
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
};
