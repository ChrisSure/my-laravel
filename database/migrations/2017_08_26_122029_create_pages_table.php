<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('slug', 255);
	        $table->string('name', 255);
	        $table->text('text')->nullable();
	        $table->string('title', 255)->nullable();
	        $table->text('description')->nullable();
	        $table->text('keywords')->nullable();
	        $table->smallInteger('sort');
	        $table->smallInteger('status')->default(0);
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
        Schema::drop('pages');
    }
}
