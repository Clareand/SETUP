<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_lists', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_class')->index('id_class_module');
            $table->integer('id_task')->nullable()->index('id_task_module');
            $table->integer('id_material')->nullable()->index('id_material_module');
            $table->enum('type', ['material', 'task']);
            $table->integer('step');
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
        Schema::dropIfExists('module_lists');
    }
}
