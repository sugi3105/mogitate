<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // bigint unsigned
            $table->string('name'); // varchar(255) NOT NULL
            $table->integer('price'); // int NOT NULL
            $table->string('image'); // varchar(255) NOT NULL
            $table->text('description'); // text NOT NULL
            $table->timestamps(); // created_at, updated_at
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prpducts');
    }
}
