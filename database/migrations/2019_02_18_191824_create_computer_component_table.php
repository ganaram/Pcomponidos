<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputerComponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_computer', function (Blueprint $table) {
            $table->unsignedInteger('computer_id');
            $table->unsignedInteger('component_id');

            $table->primary(['computer_id','component_id']);

            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computer_component');
    }
}
