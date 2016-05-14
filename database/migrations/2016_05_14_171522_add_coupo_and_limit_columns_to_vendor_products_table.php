<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoupoAndLimitColumnsToVendorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendor_products', function (Blueprint $table) {
            $table->string('coupon')->nullable();
            $table->string('limit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor_products', function (Blueprint $table) {
            $table->dropColumn('coupon');
            $table->dropColumn('limit');
        });
    }
}
