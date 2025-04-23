<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('room_designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('room_type');
            $table->json('dimensions');
            $table->json('furniture');
            $table->json('color_scheme');
            $table->json('lighting');
            $table->string('share_token')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_designs');
    }
}; 