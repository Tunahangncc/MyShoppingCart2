<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserShoppingBagPivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shopping_bag_pivots', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shopping_bag_id');

            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('shopping_bag_id')->references('id')
                ->on('shopping_bags')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_shopping_bag_pivots');
    }
}
