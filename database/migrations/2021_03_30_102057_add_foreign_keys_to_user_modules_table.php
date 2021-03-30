<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_modules', function (Blueprint $table) {
            $table->foreign('id_module', 'id_modules')->references('id')->on('module_lists')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_user', 'id_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_modules', function (Blueprint $table) {
            $table->dropForeign('id_modules');
            $table->dropForeign('id_users');
        });
    }
}
