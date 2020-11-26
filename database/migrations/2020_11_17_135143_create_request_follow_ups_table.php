<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestFollowUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followed_up_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->date('target_date')->nullable();
            $table->date('target_completion_date')->nullable();
            $table->string('technician', 100)->nullable();
            $table->enum('is_done', ['BELUM SELESAI', 'SELESAI', 'BATAL'])->nullable()->default('BELUM SELESAI');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followed_up_requests');
    }
}
