<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('wording');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
        
        Schema::create('campaign_need', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->index();
            $table->integer('need_id')->index();
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
        Schema::drop('needs');
        Schema::drop('campaign_need');
    }
}
