<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleUstadzmasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_ustadzmasjid', function (Blueprint $table) {
            $table->integer('ustadz_id')->nullable();
            $table->string('status', 30)->nullable();
            $table->string('insert_by', 30)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('update_by', 30)->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('id', true);
            $table->integer('schedule_kajianmasjid_id')->nullable();
            $table->decimal('est_kafarah', 10, 0)->nullable();
            $table->decimal('act_kafarah', 10, 0)->nullable();
            $table->boolean('accepted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_ustadzmasjid');
    }
}
