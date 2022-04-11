<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Request $request, $id){
        $product = Product::where('id', $id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);

            $request->session()->put('Cart', $newCart);
            return view('cart-item', compact('newCart'));
        }
    }
}
