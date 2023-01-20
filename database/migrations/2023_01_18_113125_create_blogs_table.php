<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title');
            $table->longText('description');
            $table->mediumText('short_description')->nullable();
            $table->mediumText('slug')->unique();
            $table->mediumText('thumbnail')->default('default.jpg');
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('og_title')->nullable();
            $table->mediumText('og_image')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('type')->default(1)->comment('1: Blog, 2: News, 3: Work');
            $table->date('publish_date')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
