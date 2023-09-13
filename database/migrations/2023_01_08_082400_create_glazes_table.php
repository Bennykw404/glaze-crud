<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glazes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('dept', ['Glaze', 'Engobe']);
            $table->enum('shift', ['1', '2', '3']);
            $table->enum('grub', ['A', 'B', 'C', 'D']);
            $table->bigInteger('spray');
            $table->bigInteger('density');
            $table->bigInteger('viscosity');
            $table->bigInteger('weight');
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
        Schema::dropIfExists('glazes');
    }
};
