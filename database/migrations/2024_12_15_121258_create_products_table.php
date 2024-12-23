<?php

use App\Models\Auction;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
//            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->enum('status', ['active','sold','pending','in-auction'])->default('active');
            $table->string('image')->default('images/meow.jpg');
            $table->timestamps();
        });
        Schema::create('auction_product', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Auction::class)->constrained()->cascadeOnDelete();
        });
        Schema::create('product_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->enum('action_type', ['buy', 'own','fav']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('auction_product');
        Schema::dropIfExists('user_product');
    }
};
