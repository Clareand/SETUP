<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassPathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_path', function (Blueprint $table) {
            $table->foreign('id_class', 'id_class_path')->references('id')->on('class_lists')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_learning_path', 'id_path_class')->references('id')->on('learning_paths')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_path', function (Blueprint $table) {
            $table->dropForeign('id_class_path');
            $table->dropForeign('id_path_class');
        });
    }
}
