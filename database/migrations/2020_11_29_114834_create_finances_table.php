<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('network_id')->index();
            $table->unsignedInteger('level_id')->index();

            $table->float('amount');
            $table->enum('reason',[
                'assign' , 'outsource' ,'admin transfer','user transfer','activation by admin',
                'activation by user','forth'
            ]);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('network_id')->references('id')->on('networks');
            $table->foreign('level_id')->references('level')->on('level_finances');

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
        Schema::dropIfExists('finances');
    }
}
