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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('created_at');
            $table->dateTimeTz('updated_at');
            $table->string('title', 255);
            $table->text('description', 1000);
            $table->string('location', 100);
            $table->dateTimeTz('start_date', 100)->nullable(true);
            $table->dateTimeTz('published_at', 100)->nullable(true);
            $table->string('picture', 150)->nullable(true);
            $table->integer('remuneration_min')->nullable(true);
            $table->integer('remuneration_max')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
