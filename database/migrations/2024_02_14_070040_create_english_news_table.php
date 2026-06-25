<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('english_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->longText('postTitle')->nullable();
            $table->longText('postBody')->nullable();
            $table->string('featherPost')->nullable();
            $table->string('treandingPost')->nullable();
            $table->string('postImage')->nullable();
            $table->integer('views')->nullable();
            $table->string('multycats')->nullable();
            $table->string('auther')->nullable();
            $table->string('tag')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('english_news');
    }
};
