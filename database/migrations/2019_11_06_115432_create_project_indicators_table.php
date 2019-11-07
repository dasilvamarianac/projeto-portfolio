<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_indicators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('project');
            $table->integer('indicator');
            $table->float('max_value');
            $table->float('min_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_indicators');
    }
}
