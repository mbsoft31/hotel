<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("number");
            $table->string("phone");
            $table->integer("bed_count")->default(1);
            $table->integer("floor_number")->default(0);
            $table->string("description")->nullable();
            $table->string("image")->nullable();

            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("hotel_id");
            $table->unsignedBigInteger("type_id")->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
