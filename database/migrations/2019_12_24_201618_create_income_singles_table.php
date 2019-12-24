<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeSinglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_singles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('amount');
            $table->date('date');
            $table->bigInteger('user_id')->unsigned();
        });

        Schema::table('income_singles', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_singles');
    }
}
