<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('top_pros', function(Blueprint $table){
            // Cái này đã được thêm bằng tay nếu mai sau chay thì mở comment ra là chạy ổn

            // $table->integer('cate_id')->unsigned();
            // $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
