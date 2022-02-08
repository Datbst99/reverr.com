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
            $table->increments('id')->unsigned();
            $table->string('title', 250);
            $table->string('desc_post');
            $table->string('img_post', 300);
            $table->text('content');
            $table->string('slug', 250);
            $table->integer('publish_at')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('cate_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');

            
            $table->index('id');
            $table->index('title');
            $table->index('img_post');
            $table->unique('slug');

            

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
