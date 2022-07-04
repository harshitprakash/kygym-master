<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_diets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('payment')->default('0');
            $table->boolean('assign')->default('0');
            $table->unsignedBigInteger('assigned_diet')->nullable();
            $table->foreign('assigned_diet')->on('diet_plans')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('remarks')->nullable();
            $table->string('bmi')->nullable();
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
        Schema::dropIfExists('request_diets');
    }
}
