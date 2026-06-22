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
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('logo')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instraLink')->nullable();
            $table->string('youTubeLink')->nullable();
            $table->string('google')->nullable();
            $table->string('address')->nullable();
            $table->string('twitter')->nullable();
            $table->string('chiefAdviser')->nullable();
            $table->string('editor')->nullable();
            $table->string('adviserEditor')->nullable();
            $table->string('copyright')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_infos');
    }
};
