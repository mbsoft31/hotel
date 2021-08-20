<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date("start");
            $table->unsignedInteger("nights");
            $table->unsignedInteger("rooms_count")->default(1);
            $table->date("end")->nullable();
            $table->foreignId("room_id")->constrained()->onDelete("cascade");
            $table->foreignId("guest_id")->constrained()->onDelete("cascade");
            $table->string("state")->default("accepted");
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
        Schema::dropIfExists('reservations');
    }
}
