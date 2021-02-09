<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 255)->unique();
            $table->string('password')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->text('address')->nullable();
            $table->enum('gender', ['M', 'F'])->default('M');
            $table->string('contact')->nullable();
            $table->string('education_detail')->nullable();
            $table->string('preferred_location')->nullable();
            $table->string('current_ctc')->nullable();
            $table->string('expected_ctc')->nullable();
            $table->integer('notice_period')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
