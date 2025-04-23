<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->integer('stock')->default(0);
            $table->json('dimensions')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->integer('warranty_period')->default(12);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_customizable')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}; 