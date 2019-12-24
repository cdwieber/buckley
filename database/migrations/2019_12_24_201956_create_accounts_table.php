<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $types = [
            'checking',
            'savings',
            'credit_card',
            'loc',
            'personal_loan',
            'auto_loan',
            'mortgage',
            'investment',
        ];

        Schema::create('accounts', function (Blueprint $table) use ( $types ) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nickname');
            $table->string('institution');
            $table->enum( 'type', $types );
            $table->boolean('is_liability')->nullable();
            $table->bigInteger('max')->nullable();
            $table->float('interest', 5, '2')->nullable();
            $table->integer('balance');
            $table->bigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
