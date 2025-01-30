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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamps();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 20)->nullable(true);
            $table->string('picture', 100)->nullable(true);
            $table->dateTimeTz('date_of_birth')->nullable(true);
            $table->text('resume')->nullable(true);
            $table->string('linkedin', 100)->nullable(true);
            $table->string('github', 100)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
