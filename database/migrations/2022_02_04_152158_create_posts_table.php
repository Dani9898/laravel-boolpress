<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table -> string('titolo');
            $table -> string('autore');
            $table -> string('sottotitolo');
            $table -> text('contenuto');
            $table -> date('data');
            $table->timestamps();

            $table -> unsignedBigInteger('category_id') -> nullable();
            $table -> foreign('category_id') -> references('id') -> on('categories');
           
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
