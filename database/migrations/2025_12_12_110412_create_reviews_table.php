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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->integer('rating')->unsigned()->min(1)->max(5);
            $table->string('title')->nullable();
            $table->text('comment');
            $table->json('images')->nullable(); // Store array of image paths
            $table->enum('status', ['approved'])->default('approved');
            $table->timestamps();

            // Indexes for better performance
            $table->index(['product_id', 'status']);
            $table->index('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
