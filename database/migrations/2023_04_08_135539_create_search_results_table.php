<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_results', function (Blueprint $table) {
            $table->id();
            $table->string('keyword');
            $table->integer('count');
            $table->integer('positive_count');
            $table->integer('negative_count');
            $table->float('score');
            $table->integer('search_provider_id')->unsigned()->nullable();
            $table->foreign('search_provider_id')->references('id')->on('search_providers');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('search_results');
    }
};
