<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('discount_id')->nullable()->after('ongkir');
            $table->unsignedInteger('potongan_diskon')->nullable()->after('discount_id');

            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * ongkir the migrations.
     * ongkir the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
