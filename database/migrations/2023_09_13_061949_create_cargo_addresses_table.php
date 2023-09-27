<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_addresses', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();

            $table->foreign('province_id')->references('id')
                ->on('provinces')->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('city_id')->references('id')
                ->on('cities')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargo_addresses');
    }
}
