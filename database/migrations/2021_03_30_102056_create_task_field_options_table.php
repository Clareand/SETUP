<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskFieldOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_field_options', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_task_field')->index('fied_option');
            $table->string('option_value');
            $table->string('option_text')->nullable();
            $table->string('option_image')->nullable();
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
        Schema::dropIfExists('task_field_options');
    }
}
