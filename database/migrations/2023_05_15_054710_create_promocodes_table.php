<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id('pcid');
            $table->string('promocode');
            $table->string('message')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('no_of_user')->nullable();
            $table->integer('min_amount');
            $table->integer('discount');
            $table->string('discount_type');
            $table->string('max_dis_amount');
            $table->string('repeat_usage');
            $table->integer('no_of_repeat_usage')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('promocodes');
    }
};
