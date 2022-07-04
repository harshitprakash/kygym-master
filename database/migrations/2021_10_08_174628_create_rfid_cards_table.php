<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfidCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfid_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member');
            $table->foreign('member')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('card')->nullable()->unique();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('rfid_cards');
    }
}
