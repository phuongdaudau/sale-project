<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Request $request, $id){
        $product = Product::where('id', $id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);

            $request->Session()->put('Cart', $newCart);
            return view('cart-item');
        }
    }

    public function deleteItemCart(Request $request, $id){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->deleteItemCart($id);
            if(Count($newCart->products) > 0){
                $request->Session()->put('Cart', $newCart);
            }else{
                $request->Session()->forget('Cart');
            }
            return view('cart-item');
    }

    public function listCart(){
        return view('cart');
    }

    public function deleteListCart(Request $request, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->deleteItemCart($id);
        if(Count($newCart->products) > 0){
            $request->Session()->put('Cart', $newCart);
        }else{
            $request->Session()->forget('Cart');
        }
        return view('list-cart-item');
    }

    public function saveQtyItemCart(Request $request, $id, $quanity){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updateItemCart($id, $quanity);
        $request->Session()->put('Cart', $newCart);
        return view('list-cart-item');
    }

    public function addCartFromDetail(Request $request, $id, $quantity){
        $product = Product::where('id', $id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCartFromDetail($product, $id, $quantity);
            $request->Session()->put('Cart', $newCart);
            return view('cart-item');
        }
    }
}
