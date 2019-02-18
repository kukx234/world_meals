<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->timestamps();
        });

       

        Schema::create('category_translations', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();
            $table->unique(['category_id','locale']);

            $table->foreign('category_id')->references('id')->on('categories');
            
        });


        
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyinteger('status');
            $table->integer('category_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::create('meal_translations', function (Blueprint $table) {
            $table->integer('meal_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');

            $table->unique(['meal_id','locale']);
            $table->foreign('meal_id')->references('id')->on('meals');
        
           
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->timestamps();

        });

        Schema::create('meal_tag', function (Blueprint $table) {
            $table->integer('meal_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('meal_id')->references('id')->on('meals');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::create('tag_translations', function (Blueprint $table) {
            $table->integer('tag_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['tag_id','locale']);

            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->timestamps();

        });

        Schema::create('ingredient_meal', function (Blueprint $table) {
            $table->integer('meal_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();

            $table->foreign('meal_id')->references('id')->on('meals');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });

        Schema::create('ingredient_translations', function (Blueprint $table) {
            $table->integer('ingredient_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['ingredient_id','locale']);
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_meal');
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('tags_translations');
        Schema::dropIfExists('meal_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('meals_translations');
        Schema::dropIfExists('meals');
        Schema::dropIfExists('categories_translations');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('categories');
    }
}
