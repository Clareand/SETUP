<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_user')->index('id_user_student');
            $table->integer('id_role')->index('id_role_student');
            $table->string('last_name');
            $table->string('address')->nullable();
            $table->char('city', 4)->nullable()->index('city_id');
            $table->string('postal_code')->nullable();
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
        Schema::dropIfExists('students');
    }
}
