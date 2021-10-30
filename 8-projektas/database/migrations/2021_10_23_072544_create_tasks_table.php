<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title", 225);
            $table->longText("description");
            $table->unsignedBigInteger("type_id");
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->string("logo");
            $table->unsignedBigInteger("owner_id");
            $table->timestamps();

            $table->foreign("type_id")->references("id")->on("types");
            $table->foreign("owner_id")->references("id")->on("owners");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
