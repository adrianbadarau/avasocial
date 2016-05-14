<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSharedLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shared_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_email');
            $table->integer('avangate_order_ref');
            $table->string('product_ids');
            $table->string('short_link');
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
        Schema::drop('user_shared_links');
    }
}
