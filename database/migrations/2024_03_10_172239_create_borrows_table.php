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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reader_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('book_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('status', ['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNING' ,'RETURNED']);
            $table->datetime('request_processed_at')->nullable();
            $table->foreignId('request_managed_by')->nullable()
                ->references('id')
                ->on('librarians')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->datetime('deadline')->nullable();
            $table->datetime('returned_at')->nullable();
            $table->foreignId('return_managed_by')->nullable()
                ->references('id')
                ->on('librarians')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
