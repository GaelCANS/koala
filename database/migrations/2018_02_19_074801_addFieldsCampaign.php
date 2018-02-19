<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsCampaign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->text('cmm_comments');
            $table->text('results');
            $table->string('main_img');
            $table->string('status');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn('cmm_comments');
            $table->dropColumn('results');
            $table->dropColumn('main_img');
            $table->dropColumn('status');
            $table->dropColumn('user_id');
        });
    }
}
