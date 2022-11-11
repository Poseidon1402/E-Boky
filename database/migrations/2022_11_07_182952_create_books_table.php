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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title', length: 50);
            $table->string(column: 'description', length: 255);
            $table->integer(column: 'price', unsigned: true)->nullable();
            $table->string(column: 'pageNumber', length: 7);
            $table->string(column: 'filePath');
            $table->string(column: 'category', length: 35)->nullable(false);
            $table->string(column: 'language', length: 40)->nullable(false);
            $table->timestamp('created_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
