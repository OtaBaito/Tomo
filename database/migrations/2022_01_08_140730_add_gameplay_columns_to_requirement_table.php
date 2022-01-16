<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGameplayColumnsToRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('division_metas', function (Blueprint $table) {
            $table->integer('gameplay_id')
                    ->after('division_requirement_id')
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
        Schema::table('division_metas', function (Blueprint $table) {
            $table->dropColumn('gameplay_id', 'cover_photo_path');
        });
    }
}
