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
        //
        Schema::create('experiences', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('title', 150);
            $table->string('description', 500);
            $table->string('github', 150);
            $table->string('url', 150);
            $table->dateTimeTz('created_at');
            $table->dateTimeTz('updated_at');
            $table->string('picture');
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
