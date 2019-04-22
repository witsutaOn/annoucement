<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_id')->unsigned()->references('id')->on('news_type');
            $table->unsignedBigInteger('organize_id')->unsigned()->references('id')->on('organize');
            $table->unsignedBigInteger('user_id')->unsigned()->references('id')->on('users');
            $table->text('images');

            $table->string('title');
            $table->string('content');
            $table->dateTime('published_at')->nullable();
            $table->integer('publish_status')->default(0);
            $table->unsignedInteger('view_count');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
