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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('description')->nullable();
            $table->string('slug')->unique();

            $table->bigInteger('last_topic_id')->unsigned()->nullable();
            $table->bigInteger('last_topic_user_id')->unsigned()->nullable();

            $table->bigInteger('last_reply_id')->unsigned()->nullable();
            $table->bigInteger('last_reply_user_id')->unsigned()->nullable();

            $table->unsignedInteger('topic_count')->default(0);
            $table->unsignedInteger('post_count')->default(0);

            $table->foreign('last_topic_user_id')->references('id')->on('users');
            $table->foreign('last_reply_user_id')->references('id')->on('users');
            $table->foreignIdFor(\App\Models\Section::class);

            $table->softDeletes();
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
        Schema::dropIfExists('categories');
    }
};
