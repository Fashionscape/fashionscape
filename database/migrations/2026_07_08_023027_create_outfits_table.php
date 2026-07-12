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
        Schema::table('users', function (Blueprint $table) {
           $table->string('discord_snowflake')->nullable();
           $table->string('password')->nullable();
        });

        Schema::create('outfits', function (Blueprint $table) {
            $table->uuid('outfit_id');
            $table->string('link');
            $table->string('submitter_id');
            $table->string('tag');
            $table->text('meta');
            $table->string('discord_name');
            $table->integer('is_deleted')->default(0);
            $table->integer('is_featured')->default(0);
            $table->integer('display_count');
            $table->string('delete_hash')->nullable();
            $table->string('file_name');
            $table->timestamps();
        });

        Schema::create('galleries', function (Blueprint $table) {
            $table->uuid('gallery_id');
            $table->string('server_id');
            $table->string('channel_id');
            $table->string('tag');
            $table->string('emoji_type');
            $table->string('emoji');
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outfits');
        Schema::dropIfExists('galleries');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('discord_snowflake');
            $table->string('password');
        });
    }
};
