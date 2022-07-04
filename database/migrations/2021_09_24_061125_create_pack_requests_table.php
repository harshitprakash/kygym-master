<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pack_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member');
            $table->unsignedBigInteger('package');
            $table->foreign('member')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('package')->references('id')->on('packages')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('status')->default('0');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('method')->default('cash');
            $table->integer('rejected')->default('0');
            $table->string('remark')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('coupon_applied')->default('0');
            $table->string('coupon_code')->nullable();
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
        Schema::dropIfExists('pack_requests');
    }
}
