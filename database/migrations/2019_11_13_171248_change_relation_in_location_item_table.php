<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRelationInLocationItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('location_item', function (Blueprint $table) {
            $table->dropForeign('location_item_item_id_foreign');
            $table->dropForeign('location_item_location_id_foreign');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('location_item', function (Blueprint $table) {
            $table->dropForeign('location_item_item_id_foreign');
            $table->dropForeign('location_item_location_id_foreign');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }
}
