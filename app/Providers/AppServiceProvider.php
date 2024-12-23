<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Gate::define('edit-product',function ($user, $product) {
            return $user->product()
                ->where('product_id', $product->id)
                ->wherePivot('action_type', 'own')
                ->exists();
        });
        Gate::define('collector', function ($user) {
            return $user->role === 'collector';
        });
        Gate::define('user', function ($user) {
            return $user->role === 'buyer' || $user->role === 'collector';
        });
        Gate::define('buyer', function ($user) {
            return $user->role === 'buyer';
        });
        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
