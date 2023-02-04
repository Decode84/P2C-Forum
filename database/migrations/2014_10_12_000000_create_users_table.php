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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('ip_address')->nullable();

            $table->unsignedInteger('reputation')->default(0);
            $table->string('hwid')->unique()->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->string('cover')->default('https://i.pravatar.cc/150?img=9');
            $table->string('username_color')->default('#92B4EC');
            $table->dateTime('last_seen_time')->nullable();
            $table->dateTime('read_time')->nullable();

            $table->unsignedBigInteger('reply_count')->default(0);
            $table->unsignedBigInteger('topic_count')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
