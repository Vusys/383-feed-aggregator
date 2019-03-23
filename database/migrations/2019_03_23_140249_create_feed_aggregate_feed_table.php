<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedAggregateFeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_feed_aggregate', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('feed_aggregate_id');
            $table->foreign('feed_aggregate_id')->references('id')->on('feed_aggregates');

            $table->unsignedBigInteger('feed_id');
            $table->foreign('feed_id')->references('id')->on('feeds');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feed_feed_aggregate');
    }
}
