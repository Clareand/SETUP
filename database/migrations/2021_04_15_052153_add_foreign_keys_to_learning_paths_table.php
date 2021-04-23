<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLearningPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('learning_paths', function (Blueprint $table) {
            $table->foreign('id_badge', 'id_badges_path')->references('id')->on('badges')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('id_field_of_tech', 'tech_id')->references('id')->on('tech_fields')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('learning_paths', function (Blueprint $table) {
            $table->dropForeign('id_badges_path');
            $table->dropForeign('tech_id');
        });
    }
}
