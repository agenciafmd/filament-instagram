<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateInstagramFeedTokenTable extends Migration
{
    public function up()
    {
        Schema::create('justbetter_instagram_feed_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('profile_id');
            $table->string('access_code');
            $table->string('username');
            $table->string('user_id');
            $table->string('user_fullname');
            $table->string('user_profile_picture');
            $table->nullableTimestamps();
        });
    }
}
