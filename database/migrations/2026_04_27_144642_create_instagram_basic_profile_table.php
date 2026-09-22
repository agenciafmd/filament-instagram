<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

final class CreateInstagramBasicProfileTable extends Migration
{
    public function up()
    {
        Schema::create('justbetter_instagram_basic_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')
                ->unique();
            $table->integer('media_count')
                ->default(0);
            $table->string('identity_token')
                ->nullable();
            $table->nullableTimestamps();
        });
    }
}
