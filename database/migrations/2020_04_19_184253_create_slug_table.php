<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlugTable extends Migration
{
    const SLUG = 'slugs';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::SLUG, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('slugable_id')->unsigned()->index();
            $table->string('slugable_type', 20);
            $table->string('title');
            $table->string('title_slug');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table(self::SLUG, function (Blueprint $table) {
            $table->index(['slugable_id', 'slugable_type', 'title_slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::SLUG);
    }
}
