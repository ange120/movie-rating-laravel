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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_api');
            $table->string('title')->nullable();
            $table->text('overview')->nullable();
            $table->string('original_language')->nullable();
            $table->decimal('popularity', 8, 2)->nullable();
            $table->date('release_date')->nullable();
            $table->decimal('vote_average', 3, 1)->nullable();
            $table->integer('vote_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
