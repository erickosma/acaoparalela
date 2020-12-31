<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    const ADDRESSES = 'addresses';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::ADDRESSES, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('addressesble_id')->unsigned()->index();
            $table->string('addressesble_type', 20);
            $table->text('address')->nullable();
            $table->string('complement', 250)->nullable();
            $table->integer('city_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->nullable();
            $table->decimal('latitude',10,8)->nullable();
            $table->decimal('longitude',11,8)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table(self::ADDRESSES, function (Blueprint $table) {
            $table->index(['addressesble_id', 'addressesble_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::ADDRESSES);
    }
}
