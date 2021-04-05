<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_fields', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_task')->index('task_field');
            $table->text('field_question');
            $table->enum('field_type', ['short answer', 'multiple', 'file upload']);
            $table->integer('point');
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
        Schema::dropIfExists('task_fields');
    }
}
