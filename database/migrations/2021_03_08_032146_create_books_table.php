<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('author', 256);
            $table->string('userBorrowing', 256)->nullable();
            $table->dateTime('publicationDate');
            $table->bigInteger('category_id')->unsigned();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
