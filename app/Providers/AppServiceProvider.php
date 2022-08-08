<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Type;
use App\Models\Material;
use App\Models\Cart;

use Session;
use Illuminate\Support\Facades\Route;

use Illuminate\Pagination\Paginator;/*dung phan trang co danh so*/

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['header', 'admin.product_add', 'page.tim_kichthuoc'], function($view){
            $loai_sp = Type::all();
            $loai_chatlieu = Material::all();

            $view->with('loai_sp',$loai_sp);
            $view->with('loai_chatlieu',$loai_chatlieu);
        });

        
        view()->composer(['header','page.dat_hang'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=> Session::get('cart'),
                'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });

        // view()->composer(['page.chitiet'], function($view){
        //     $spham = Product::all();
           
        //     $view->with('spham', $spham);
        // });

        Paginator::useBootstrap();/*dung phan trang co danh so*/
    }
}
