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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('sid');
            $table->string('cname');
            $table->string('cslug');
            $table->integer('is_parent')->default('0');
            $table->integer('priority')->default('9999');
            $table->integer('head')->default('0');
            $table->string('image')->nullable();
            $table->integer('status')->default('1');
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('categories');
    }
};
