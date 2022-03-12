<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleKajianmasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_kajianmasjid', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('masjid_id')->nullable();
            $table->string('kajian_title', 80)->nullable();
            $table->integer('sylabus_id')->nullable();
            $table->dateTime('kajian_date')->nullable();
            $table->string('status_kajian', 30)->nullable();
            $table->integer('notif_counter')->nullable();
            $table->string('insert_by', 30)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('updated_by', 30)->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->softDeletes();
            $table->integer('created_by')->nullable();
            $table->string('tipe_kajian', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_kajianmasjid');
    }
}
