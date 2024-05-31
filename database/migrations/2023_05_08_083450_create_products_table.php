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
        Schema::create('products', function (Blueprint $table) {
            $table->id('pid');
            $table->string('name');
            $table->string('slug');
            $table->string('product_code')->nullable();
            $table->string('hsn')->nullable();
            $table->string('measurement')->nullable();
            $table->string('unit');
            $table->integer('pstatus')->comment('1- available, 0- sold out');
            $table->integer('mrp_price');
            $table->integer('selling_price');
            $table->integer('discount');
            $table->string('category');
            $table->string('cname')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('scname')->nullable();
            $table->string('manufacturer',)->nullable();
            $table->string('made_in')->nullable();
            $table->string('shipping_type');  
            $table->string('delivery_places');
            $table->string('pincode')->nullable();
            $table->string('returnable')->default('0');
            $table->string('cancelable')->default('0');
            $table->string('cod_allowed')->default('0');
            $table->string('itemimage');
            $table->text('multi_image')->nullable();
            $table->string('bookpdf')->nullable();
            $table->integer('position')->default('9999');
            $table->text('short_desc')->nullable();
            $table->text('full_desc')->nullable();
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
        Schema::dropIfExists('products');
    }
};
