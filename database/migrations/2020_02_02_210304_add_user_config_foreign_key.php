<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserConfigForeignKey extends Migration
{
    const USER_CONFIGS = 'user_configs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::USER_CONFIGS, function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table(self::USER_CONFIGS, function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}
