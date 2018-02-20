<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampaignChannelIndicator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_channel_indicator', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_channel_id');
            $table->integer('indicator_id');
            $table->float('goal');
            $table->float('result');
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
        Schema::drop('campaign_channel_indicator');
    }
}
