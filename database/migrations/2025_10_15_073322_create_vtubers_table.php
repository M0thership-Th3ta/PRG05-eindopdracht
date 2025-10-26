<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vtubers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('agency', 128)->nullable();
            $table->string('age', 64)->nullable();
            $table->string('gender', 64);
            $table->string('height', 64)->nullable();
            $table->string('weight', 64)->nullable();
            $table->string('nationality', 64)->nullable();
            $table->string('zodiac_sign', 64)->nullable();
            $table->string('fandom_name', 128)->nullable();
            $table->string('emoji', 64)->nullable();
            $table->string('image', 256);
            $table->date('birthday')->nullable();
            $table->date('debut_date');
            $table->string('youtube_channel_id', 128)->nullable();
            $table->string('twitch_channel_id', 128)->nullable();
            $table->string('twitter_handle', 128)->nullable();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vtubers');
    }
};
