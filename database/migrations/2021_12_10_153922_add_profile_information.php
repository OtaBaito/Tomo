<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function (Blueprint $table) {
			$table->text('nickname')
				->after('two_factor_recovery_codes')
				->nullable();
			$table->integer('gender')
				->after('nickname')
				->nullable();
			$table->timestamp('birthday')
				->after('gender')
				->nullable();
			$table->integer('location')
				->after('birthday')
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
		Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname', 'gender', 'birthday', 'location');
        });
    }
}
