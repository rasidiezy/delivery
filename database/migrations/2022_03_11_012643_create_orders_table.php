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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pickup_id');
            $table->string('nama');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->text('alamat');
            $table->text('detail');
            $table->unsignedInteger('berat');
            $table->string('no_hp');
            $table->string('request_order')->nullable();
            $table->unsignedInteger('ongkir');
            $table->unsignedInteger('total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pickup_id')->references('id')->on('pickups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
