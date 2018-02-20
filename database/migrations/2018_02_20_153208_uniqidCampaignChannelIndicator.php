<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UniqidCampaignChannelIndicator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_channel_indicator', function (Blueprint $table) {
            $table->string('uniqid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_channel_indicator', function (Blueprint $table) {
            $table->string('uniqid');
        });
    }
}
