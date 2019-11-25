<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('location_id');
            $table->string('image');
            $table->text('details')->nullable();
            $table->float('price');
            $table->float('rate')->default(0);
            $table->integer('rate_count')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('location_id')->on('locations')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items',function(Blueprint $table){
            $table->dropForeign('items_location_id_foreign');
            $table->dropForeign('items_category_id_foreign');
        });
        Schema::dropIfExists('items');
    }
}
