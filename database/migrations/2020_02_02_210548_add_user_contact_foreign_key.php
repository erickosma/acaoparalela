<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserContactForeignKey extends Migration
{
    const USER_CONTACTS = 'user_contacts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('' . self::USER_CONTACTS . '', function (Blueprint $table) {
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
        if (!app()->environment( 'testing')) {
            Schema::table(self::USER_CONTACTS, function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }

    }
}
