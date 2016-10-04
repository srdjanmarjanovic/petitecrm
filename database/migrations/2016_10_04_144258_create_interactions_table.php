<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender_type');
            $table->integer('sender_id');
            $table->string('receiver_type');
            $table->integer('receiver_id');
            $table->string('type');
            $table->text('body');
            $table->string('uuid')->unique();
            $table->integer('parent_id')->nullable();
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
        Schema::drop('interactions');
    }
}
