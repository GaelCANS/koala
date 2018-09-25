<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCampaignChannelWithTrello extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_channel', function (Blueprint $table) {
            $table->string('trello_cardId');
            $table->string('trello_checklistItemId');
            $table->string('trello_checklistId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_channel', function (Blueprint $table) {
            $table->dropColumn('trello_cardId');
            $table->dropColumn('trello_checklistItemId');
            $table->dropColumn('trello_checklistId');
        });
    }
}
