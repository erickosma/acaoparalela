<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateenderecosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('desc');
            $table->string('complemento', 250);
            $table->string('bairro', 250);
            $table->integer('cidade_id')->unsigned();
            $table->integer('pais_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('enderecos', function (Blueprint $table) {
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
        Schema::drop('enderecos');
    }
}
