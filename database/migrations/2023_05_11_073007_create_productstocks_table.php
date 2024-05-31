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
        Schema::create('productstocks', function (Blueprint $table) {
            $table->id('psid');
            $table->integer('ppid');
            $table->string('pmeasurement')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('punit')->nullable();
            $table->integer('pmrp_price');
            $table->integer('pselling_price');
            $table->float('pdiscount')->nullable();
            $table->integer('pstock');
            $table->integer('ppstatus')->comment('1- available, 0- sold out');
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
        Schema::dropIfExists('productstocks');
    }
};
