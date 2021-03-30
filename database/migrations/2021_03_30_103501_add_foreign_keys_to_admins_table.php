<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('id_user', 'id_admin_role')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_user', 'id_admin_user')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('city', 'id_city')->references('id')->on('regencies')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign('id_admin_role');
            $table->dropForeign('id_admin_user');
            $table->dropForeign('id_city');
        });
    }
}
