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
        Schema::create('word_results', function (Blueprint $table) {
            $table->id();
            $table->string('keyword');
            $table->integer('positive_count');
            $table->integer('negative_count');
            $table->float('score');
            $table->integer('word_provider_id')->unsigned()->nullable();
            $table->foreign('word_provider_id')->references('id')->on('word_providers');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_results');
    }
};
