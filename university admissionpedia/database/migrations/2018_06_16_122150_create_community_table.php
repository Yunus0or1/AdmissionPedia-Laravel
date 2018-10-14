<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
			$table->string('user_name');
			$table->string('topic');
            $table->string('question');
            $table->string('asked_at')->nullable();
			
			
            $table->engine = 'InnoDB';
        });
		
		
		
		
        Schema::create('reply', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('question_id')->unsigned();
            $table->integer('commenter_id')->unsigned();
			$table->string('commenter_name');
            $table->string('reply');
            $table->string('commented_at');


            $table->engine = 'InnoDB';
        });
		
        Schema::create('subscribelists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('universityId');
            $table->string('emailAddress')->nullable();
            $table->integer('subscription');

        });		
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
		Schema::dropIfExists('reply');
		Schema::dropIfExists('subscribelists');
    }
}
