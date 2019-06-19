<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->text('detail');
            $table->integer('service_id');
            $table->integer('user_id');
            $table->integer('campaign_id');
            $table->boolean('done')->default(false);
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('notification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifications');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('notification');
        });
    }
}
