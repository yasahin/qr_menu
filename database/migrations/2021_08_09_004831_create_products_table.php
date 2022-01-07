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
            $table->id();
            $table->bigInteger("category_id")->unsigned();
            $table->text("picture")->nullable();
            $table->text("name");
            $table->text("desc")->nullable();
            $table->double("price");
            $table->double("sale_price")->nullable();
            $table->bigInteger("durum")->default(0);
            $table->timestamps();

            $table->foreign("category_id")
                ->references("id")
                ->on("categories")
                ->onDelete("cascade");

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
}
