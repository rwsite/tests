<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books_log', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->datetime('date_start');
            $table->datetime('date_end')->nullable();
            $table->dateTime('planing_end')->nullable();

            $table->foreignId('book_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books_log');
    }
};
