<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateuserOngsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('endereco_id')->unsigned();
            $table->string('nome_fantasia', 250);
            $table->string('razao_social', 250);
            $table->text('desc_ong');
            $table->string('site', 250);
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::table('user_ongs', function (Blueprint $table) {
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
        Schema::drop('user_ongs');
    }
}
