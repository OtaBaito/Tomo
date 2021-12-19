<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_requirements', function (Blueprint $table) {
            $table->id();
			$table->foreignId('game_division_id');
			$table->string('title');
			$table->string('description')->nullable();
			$table->integer('attachment', 0);
			$table->integer('mandate', 0);
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
        Schema::dropIfExists('division_requirements');
    }
}
