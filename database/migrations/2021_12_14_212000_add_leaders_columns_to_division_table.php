<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLeadersColumnsToDivisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_divisions', function (Blueprint $table) {
            $table->integer('leader')
                    ->after('platform')
                    ->nullable();

            $table->text('cover_photo_path')
                    ->after('leader')
                    ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_divisions', function (Blueprint $table) {
            $table->dropColumn('leader', 'cover_photo_path');
        });
    }
}
