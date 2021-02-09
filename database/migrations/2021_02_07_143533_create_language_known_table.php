<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageKnownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_knowns', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('language')->nullable();
            $table->boolean('read')->default(false);
            $table->boolean('write')->default(false);
            $table->boolean('speak')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_knowns');
    }
}
