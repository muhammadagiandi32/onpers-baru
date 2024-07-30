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
        Schema::create('news', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('image_name')->nullable();
            $table->string('image_url')->nullable();
            $table->foreignUuid('author_id')->references('uuid')->on('users');
            $table->foreignUuid('category_id')->references('id')->on('categories');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
