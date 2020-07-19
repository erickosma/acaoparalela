<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSysOccupationAreaMacro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sys_occupation_areas', function (Blueprint $table) {
            $table->bigInteger('sys_macro_id')->nullable();
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
            Schema::table('sys_occupation_areas', function (Blueprint $table) {
                $table->dropColumn('sys_macro_id');
            });
        }

    }
}
