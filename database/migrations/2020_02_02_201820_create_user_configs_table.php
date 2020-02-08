<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserConfigsTable extends Migration
{
    const USER_CONFIGS = 'user_configs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('' . self::USER_CONFIGS . '', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->smallinteger('confidential_address')->default(0);
            $table->smallinteger('confidential_email')->default(0);
            $table->smallinteger('confidential_phone')->default(0);
            $table->smallinteger('confidential_notification')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::USER_CONFIGS);
    }
}
