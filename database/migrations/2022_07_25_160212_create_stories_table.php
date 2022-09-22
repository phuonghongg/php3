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
        Schema::create('stories', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('name');
            $table->string('author')->nullable();
            $table->text('summary')->nullable();
            $table->string('url_img')->nullable();
            $table->integer('viewers')->default(1);
            $table->string('slug_genre', 50);
            $table->integer('status')->default(0);
            $table->string('source')->nullable();
            $table->timestamps();
            

            //set foreign key
            $table->foreign('slug_genre')->references('slug')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
};
