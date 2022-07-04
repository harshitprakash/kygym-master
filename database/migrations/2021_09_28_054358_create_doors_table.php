<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member')->unique();
            $table->foreign('member')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('allow')->default('1');
            $table->string('tag_id')->nullable()->unique();
            $table->string('auth-key');
            $table->date('access_till')->nullable();
            $table->timestamp('last_visit')->nullable();
            $table->string('qr_code')->nullable();
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
        Schema::dropIfExists('doors');
    }
}
