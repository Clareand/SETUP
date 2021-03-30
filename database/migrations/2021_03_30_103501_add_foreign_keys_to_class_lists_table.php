<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_lists', function (Blueprint $table) {
            $table->foreign('id_learning_path', 'id_learning_path')->references('id')->on('learning_paths')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('field_of_tech', 'id_tech')->references('id')->on('tech_fields')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_lists', function (Blueprint $table) {
            $table->dropForeign('id_learning_path');
            $table->dropForeign('id_tech');
        });
    }
}
