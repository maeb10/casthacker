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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('podcast_id');
            $table->string('number');
            $table->string('title');
            $table->string('url');
            $table->text('content_text');
            $table->text('content_html');
            $table->dateTime('published_at')->nullable();
            $table->string('download_url');
            $table->string('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
