<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('objective_id')->unsigned()->index();
            $table->foreign('objective_id')->references('id')->on('objectives')->onDelete('cascade');   
            $table->string('description');         
            $table->boolean('finished')->default(0);
            $table->bigInteger('approach');//guardar los segundos de los dias
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goals');
    }
}
