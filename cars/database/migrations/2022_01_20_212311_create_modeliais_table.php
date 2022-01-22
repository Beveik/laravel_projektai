<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeliaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modeliais', function (Blueprint $table) {
            $table->id();
            $table->string("modelis");
            $table->unsignedBigInteger("markes_id");
            $table->unsignedBigInteger("metu_id");
            $table->timestamps();

            $table->foreign("markes_id")->references("id")->on("markes");
            $table->foreign("metu_id")->references("id")->on("metais");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modeliais');
    }
}
