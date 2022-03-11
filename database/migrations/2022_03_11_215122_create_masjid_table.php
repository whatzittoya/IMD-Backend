<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masjid', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 30)->default('');
            $table->decimal('lat', 8, 8)->nullable();
            $table->decimal('lon', 8, 8)->nullable();
            $table->string('committe1', 30)->nullable();
            $table->string('committe2', 30)->nullable();
            $table->string('hp1', 30)->nullable();
            $table->string('hp2', 30)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('insert_by', 30)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('update_by', 30)->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('kabupaten', 80)->nullable();
            $table->string('kecamatan', 80)->nullable();
            $table->string('tipologi', 30)->nullable();
            $table->string('tanah_luas', 10)->nullable();
            $table->string('tanah_status', 30)->nullable();
            $table->string('bangunan_luas', 10)->nullable();
            $table->integer('tahun_berdiri')->nullable();
            $table->string('jml_jemaah', 80)->nullable();
            $table->integer('jml_imam')->nullable();
            $table->integer('jml_khatib')->nullable();
            $table->integer('jml_muazin')->nullable();
            $table->integer('jml_remaja')->nullable();
            $table->string('id_masjid', 40)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('image', 200)->nullable();
            $table->integer('user_id')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masjid');
    }
}
