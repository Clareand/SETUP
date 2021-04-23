<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('city', 'city_id')->references('id')->on('regencies')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('id_role', 'id_role_student')->references('id')->on('roles')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_user', 'id_user_student')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('city_id');
            $table->dropForeign('id_role_student');
            $table->dropForeign('id_user_student');
        });
    }
}
