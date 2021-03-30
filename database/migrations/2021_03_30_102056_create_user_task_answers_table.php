<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTaskAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_task_answers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_user')->index('user_answer');
            $table->integer('id_user_task')->index('id_user_task');
            $table->integer('id_task')->index('id_tasks');
            $table->integer('id_task_field')->index('id_task_fields');
            $table->string('answer_short', 50)->nullable();
            $table->text('answer_multiple')->nullable();
            $table->string('answer_upload')->nullable();
            $table->integer('point')->nullable()->default(0);
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
        Schema::dropIfExists('user_task_answers');
    }
}
