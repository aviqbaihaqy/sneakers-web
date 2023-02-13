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
            $table->id();
            $table->string('shortName');
            $table->string('name');
            $table->double('price');
            $table->json('assets');
            $table->string('color');
            $table->text('description');
            $table->json('sizes');
            $table->unsignedBigInteger('brand_id');
            $table->string('type');
            $table->timestamps();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')->onDelete('cascade');
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
