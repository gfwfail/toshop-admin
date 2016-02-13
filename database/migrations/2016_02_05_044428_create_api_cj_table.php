<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApiCjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('api_cj', function(Blueprint $table) {
                $table->increments('id');

                $table->string("action-status");
                $table->string("action-type");
                $table->string("aid");
                $table->string("commission-id");
                $table->string("country");
                $table->string("event-date");
                $table->string("locking-date");
                $table->string("order-id");
                $table->string("original");
                $table->string("original-action-id");
                $table->string("posting-date");
                $table->string("website-id");
                $table->string("action-tracker-id");
                $table->string("action-tracker-name");
                $table->string("cid");
                $table->string("advertiser-name");
                $table->string("commission-amount");
                $table->string("order-discount");
                $table->string("sid");
                $table->string("sale-amount");
                $table->integer("unprocessed");
                
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
        Schema::drop('api_cj');
    }

}
