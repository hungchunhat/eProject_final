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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Auction::class)->constrained()->cascadeOnDelete();
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('bid_price')->nullable();
            $table->string('winner_name')->nullable();
            $table->string('winner_email')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
