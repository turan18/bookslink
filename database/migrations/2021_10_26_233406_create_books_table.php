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
            $table->string('volume_id')->unique();
            $table->string('title');
            $table->string('author');
            $table->smallInteger('full_rating')->default('0');
            $table->longText('description')->nullable();

//            $table->mediumText('snippet')->nullable();
//            $table->string('publisher');
//            $table->date('publication_date');
//            $table->string('isbn_13')->unique();
//            $table->string('language');
//            $table->string('maturity');
//            $table->string('category');
//            $table->tinyInteger('embeddable');
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
        Schema::dropIfExists('books');
    }
}
