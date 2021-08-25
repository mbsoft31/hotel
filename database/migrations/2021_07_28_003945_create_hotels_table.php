<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedInteger("stars")->default(0);
            $table->text("description")->nullable();
            $table->text("address")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->integer("zipcode")->nullable();
            $table->string("contact_name")->nullable();
            $table->string("contact_phone")->nullable();
            $table->text("photos")->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
