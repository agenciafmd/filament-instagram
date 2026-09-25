<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('justbetter_instagram_feed_tokens', static function (Blueprint $table): void {
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
};
