<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateuserProfessionalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_professionals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('endereco_id')->unsigned();
            $table->date('data_nascimento');
            $table->text('objetivos');
            $table->string('horario');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('user_professionals', function (Blueprint $table) {
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
        Schema::drop('user_professionals');

        /*Schema::create('user_professionals', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
        });*/

    }
}
