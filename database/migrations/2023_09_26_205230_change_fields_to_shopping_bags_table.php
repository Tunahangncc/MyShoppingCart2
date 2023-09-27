<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsToShoppingBagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopping_bags', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['product_id']);

            $table->dropColumn('user_id');
            $table->dropColumn('product_id');
            $table->dropColumn('amount');
        });

        Schema::table('shopping_bags', function (Blueprint $table) {
            $table->string('code')->unique()->after('id');
            $table->boolean('active')->after('code')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopping_bags', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('active');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');

            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('product_id')->references('id')
                ->on('products')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
}
