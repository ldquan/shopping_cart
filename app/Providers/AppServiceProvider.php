<?php

namespace App\Providers;

use App\Cart;
use App\ProductType;
use function foo\func;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('block.header',function($view){
           $product_types = ProductType::all();
           $view->with('product_types', $product_types);
        });

        view()->composer('block.footer',function($view){
           $product_types = ProductType::all();
           $view->with('product_types', $product_types);
        });

        view()->composer('block.header', function($view){
            if(Session::has('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with([
                    'cart' => Session::get('cart'),
                    'cart_products' => $cart->items,
                    'totalPrice' => $cart->totalPrice,
                    'totalQty' => $cart->totalQty]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
