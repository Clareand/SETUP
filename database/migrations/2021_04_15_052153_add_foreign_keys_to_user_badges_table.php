<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_badges', function (Blueprint $table) {
            $table->foreign('id_badge', 'id_badge')->references('id')->on('badges')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_user', 'id_user')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_badges', function (Blueprint $table) {
            $table->dropForeign('id_badge');
            $table->dropForeign('id_user');
        });
    }
}
