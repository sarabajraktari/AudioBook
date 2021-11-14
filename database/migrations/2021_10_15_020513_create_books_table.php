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
            $table->increments('isbn');
            $table->string('title');
            $table->string('author');
            $table->bigInteger('pages');
            $table->timestamps();
        });

        Schema::create('book_chapter', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_isbn');
            $table->string('chapter_name');
            $table->timestamps();

            // one to many 
            $table->foreign('book_isbn')
                ->references('isbn')
                ->on('books')
                ->onDelete('cascade');
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
