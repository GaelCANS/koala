<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CampaigneChannelIndicatorChangetype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_channel_indicator', function (Blueprint $table) {
            $table->string('result')->change();
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
            $table->double('result')->change();
        });
    }
}
