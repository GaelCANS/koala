<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampaignChannelTablle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_channel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id');
            $table->integer('channel_id');
            $table->text('comment');
            $table->date('begin');
            $table->date('end');
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
        Schema::drop('campaign_channel');
    }
}
