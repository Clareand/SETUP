<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassPathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_path', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_class')->index('id_class_path');
            $table->integer('id_learning_path')->index('id_path_class');
            $table->integer('step');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_path');
    }
}
