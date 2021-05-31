<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buyer_proposal_id');
            $table->foreignId('user_id');
            $table->string('status')->default('in-progress');
            $table->unsignedBigInteger('decision_for');
            $table->unsignedBigInteger('decision_against');
            $table->foreign('decision_for')->references('id')->on('users');
            $table->foreign('decision_against')->references('id')->on('users');
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
        Schema::dropIfExists('disputes');
    }
}
