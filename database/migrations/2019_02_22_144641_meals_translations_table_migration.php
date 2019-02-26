<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MealsTranslationsTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_translations', function (Blueprint $table) {
            $table->integer('meal_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');

            $table->unique(['meal_id','locale']);
            $table->foreign('meal_id')->references('id')->on('meals');
        
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals_translations');
    }
}
