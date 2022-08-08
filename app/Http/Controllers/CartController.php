<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Type;
use App\Models\Material;
use App\Models\Orders;
use App\Models\OrderItem;

class CartController extends Controller
{
    //giohang
    public function getAddToCart(Request $req,$id){
        $product = Product::find($id);//tim sp co id nao k
        if($product != null){
            $oldCart = Session('cart')?Session::get('cart'):null;//ktra trong session co session cart chua, neu co lay session do gan cho oldcart
            $cart = new Cart($oldCart);//khoi tao gio, gan vao..
            $cart->add($product,$id);//them 1 ptu vao gio
            $req->session()->put('cart',$cart);//put gio vao session cart
        }
        return redirect()->back();//tro ve view ban dau
    }

    //xoa giohang
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
         $cart = new Cart($oldCart);
         $cart->removeItem($id);

         if(count($cart->items)>0){
            Session::put('cart', $cart);
         }
         else{
            Session::forget('cart');
         }
         return redirect()->back();
    }

    public function getCheckout(){
        // $us = User::find(Auth::user()->id);
        // if($us != null){
        //     dd($us->id);
        // }
        
        return view('page.dat_hang');
    }

    public function postCheckout(Request $res){
        $cart = Session::get('cart');
        //dd($cart);
        //dd($cart->totalPrice);
        
        if(Auth::check() ){//xem nguoi dung dang nhap chua?
            $customer = User::find(Auth::user()->id);

            $bill = new Orders();
            $bill->id_user = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->payment = $res->payment_method;
            $bill->note = $res->notes;
            $bill->save();

            foreach ($cart->items as $key => $value) {
                $bill_detail = new OrderItem();
                $bill_detail->id_order = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->price = ($value['pricee']/$value['qty']);
                $bill_detail->save();
            }
            Session::forget('cart');
            return redirect()->back()->with('thongbao','Đặt hàng thành công');
        }
        else{
            return view('page.dangnhap');
        }

    }
}
