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
            $table->foreignId("hotel_id")->constrained()->onDelete("cascade");
            $table->foreignId("room_type_id")->constrained()->onDelete("cascade");

            $table->string("name");
            $table->text("description")->nullable();
            $table->integer("rooms_count")->default(1);
            $table->integer("floor_number")->default(1);
            // $table->text("photos")->nullable();

            $table->boolean("no_smoking")->default(0);
            $table->float("room_size")->default(0);
            $table->string("room_size_measure_unit")->default("sq_meter");
            $table->float("room_price_x_person")->default(0);
            $table->string("room_price_currency")->default("DZD");
            $table->boolean("discount_available")->default(0);
            $table->float("room_discount_x_person")->default(0);
            $table->string("room_discount_x_person_type")->default("amount");

            $table->text("metas")->nullable();
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
