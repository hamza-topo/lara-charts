<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('membre_id')->unsigned()->nullable();
            $table->tinyInteger('is_expired')->default(0)->comment="0:No,1:yes";
            $table->timestamps();
        });
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->foreign('membre_id')->references('id')->on('membres')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
