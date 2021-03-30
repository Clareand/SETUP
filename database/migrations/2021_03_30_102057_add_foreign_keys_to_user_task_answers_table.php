<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserTaskAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_task_answers', function (Blueprint $table) {
            $table->foreign('id_task_field', 'id_task_fields')->references('id')->on('task_fields')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_task', 'id_tasks')->references('id')->on('tasks')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_user_task', 'id_user_task')->references('id')->on('user_tasks')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_user', 'user_answer')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_task_answers', function (Blueprint $table) {
            $table->dropForeign('id_task_fields');
            $table->dropForeign('id_tasks');
            $table->dropForeign('id_user_task');
            $table->dropForeign('user_answer');
        });
    }
}
