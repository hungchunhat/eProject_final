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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->enum('category', ['normal', 'sponsored'])->default('normal');
            $table->enum('status', ['upcoming', 'live', 'ended'])->default('upcoming');
            $table->string('image')->default('images/meow.jpg');
            $table->integer('bid_step');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auctions');
    }
};
