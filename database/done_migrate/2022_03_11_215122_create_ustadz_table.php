<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUstadzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ustadz', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50)->default('');
            $table->string('image', 50)->nullable();
            $table->string('address', 160)->nullable();
            $table->decimal('lat', 8, 8)->nullable();
            $table->decimal('lon', 8, 8)->nullable();
            $table->date('birth_date')->nullable();
            $table->decimal('regular_kafarah', 10, 0)->nullable();
            $table->string('hp', 30)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('kabupaten', 80)->nullable();
            $table->string('kecamatan', 80)->nullable();
            $table->integer('user_id')->nullable();
            $table->string('insert_by', 30)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('update_by', 30)->nullable();
            $table->dateTime('updated_at')->nullable();
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
        Schema::dropIfExists('ustadz');
    }
}
