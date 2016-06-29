<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Createuser_professionalsTable extends Migration
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
            $table->number('user_id ');
            $table->number('endereco_id ');
            $table->date('data_nascimento');
            $table-> text('objetivos');
            $table->string('horario ');
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
        Schema::drop('user_professionals');
    }
}
