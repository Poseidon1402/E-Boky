<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->string(column: 'name', length: 40)->primary();
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('category')->references('wording')->on('categories')->onUpdate('cascade');
            $table->foreign('language')->references('name')->on('languages')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
};
