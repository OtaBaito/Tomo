<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_metas', function (Blueprint $table) {
            $table->id();
			$table->foreignId('division_requirement_id');
            $table->foreignId('user_id');
			$table->string('description')->nullable();
			$table->foreignId('user_attachment_id')->nullable();
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
        Schema::dropIfExists('division_metas');
    }
}
