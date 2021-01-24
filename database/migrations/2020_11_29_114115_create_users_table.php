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
            $table->string('first_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('passport_info')->nullable();
            $table->string('image')->nullable();
            $table->string('code')->unique()->nullable();
            $table->bigInteger('sub_of')->unsigned()->index()->nullable();
            $table->foreign('sub_of')->references('id')->on('users');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('rule_id')->index()->unsigned();
            $table->foreign('rule_id')->references('id')->on('rules');
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
