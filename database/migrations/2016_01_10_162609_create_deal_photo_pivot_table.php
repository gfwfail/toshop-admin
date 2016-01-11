<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealPhotoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_photo', function (Blueprint $table) {
            $table->integer('deal_id')->unsigned()->index();
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade');
            $table->integer('photo_id')->unsigned()->index();
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->primary(['deal_id', 'photo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deal_photo');
    }
}
