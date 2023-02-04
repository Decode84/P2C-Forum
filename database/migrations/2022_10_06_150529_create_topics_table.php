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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->boolean('locked')->default(false);
            $table->boolean('pinned')->default(false);

            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Category::class);

            $table->bigInteger('first_reply_id')->unsigned()->nullable();
            $table->bigInteger('last_reply_id')->unsigned()->nullable();
            $table->foreign('first_reply_id')->references('id')->on('replies')->onDelete('set null');
            $table->foreign('last_reply_id')->references('id')->on('replies')->onDelete('set null');

            $table->unsignedInteger('last_post_number')->nullable();
            $table->unsignedInteger('reply_count')->default(0);
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('participants_count')->default(0);
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
        Schema::dropIfExists('topics');
    }
};
