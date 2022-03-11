<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUstadzEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ustadz_education', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('ustadz_id')->nullable();
            $table->date('graduate_date')->nullable();
            $table->string('education_level', 30)->nullable();
            $table->string('program_major', 30)->nullable();
            $table->string('univ_name', 80)->nullable();
            $table->string('univ_city', 60)->nullable();
            $table->string('univ_country', 60)->nullable();
            $table->string('insert_by', 30)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('update_by', 30)->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ustadz_education');
    }
}
