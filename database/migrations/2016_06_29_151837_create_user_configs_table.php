<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateuserConfigsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->smallinteger('endereco_confidencial');
            $table->smallinteger('email_confidencial');
            $table->smallinteger('telefone_confidencial');
            $table->smallinteger('notificacao_confidencial');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('user_configs', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::drop('user_configs');
    }
}
