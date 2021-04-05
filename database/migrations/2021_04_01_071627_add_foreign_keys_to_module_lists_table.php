<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToModuleListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_lists', function (Blueprint $table) {
            $table->foreign('id_class', 'id_class_module')->references('id')->on('class_lists')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_material', 'id_material_module')->references('id')->on('materials')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_task', 'id_task_module')->references('id')->on('tasks')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_lists', function (Blueprint $table) {
            $table->dropForeign('id_class_module');
            $table->dropForeign('id_material_module');
            $table->dropForeign('id_task_module');
        });
    }
}
