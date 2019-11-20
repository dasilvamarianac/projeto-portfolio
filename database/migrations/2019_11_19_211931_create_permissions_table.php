<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('users');
            $table->integer('permissions');
            $table->integer('indicators');
            $table->integer('members');
            $table->integer('projects');
            $table->integer('project_detail');
            $table->integer('project_member');
            $table->integer('project_indicators');
            $table->integer('status_change');
            $table->integer('indicator_value');
            $table->integer('reports');
            $table->integer('progress');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
