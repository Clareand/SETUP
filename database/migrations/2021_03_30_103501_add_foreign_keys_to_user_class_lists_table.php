<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserClassListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_class_lists', function (Blueprint $table) {
            $table->foreign('id_class', 'id_class')->references('id')->on('class_lists')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_user', 'id_user_class')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_class_lists', function (Blueprint $table) {
            $table->dropForeign('id_class');
            $table->dropForeign('id_user_class');
        });
    }
}
