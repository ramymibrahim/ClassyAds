<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('items',function(Blueprint $table){
            $table->dropForeign('items_location_id_foreign');
            $table->dropColumn('location_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('items',function(Blueprint $table){
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->on('locations')->references('id');
        });
    }
}
