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
        Schema::create('mealplans', function (Blueprint $table) {
            $table->id();
            $table->integer('dayid');
            $table->integer('schedule')->comment('1= breakfast , 2 = lunch , 3 = dinner');
            $table->integer('rangeid');
            $table->text('content');
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
        Schema::dropIfExists('mealplans');
    }
};
