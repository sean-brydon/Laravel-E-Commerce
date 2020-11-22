<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Class ProductsController
 * @mixin Eloquent
 */
class ProductsController extends Controller
{
    public function index()
    {
        // TODO: Add pagination
        $products = Product::all();
        return view('products',compact('products'));
    }
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        // Check if product exists with this Id
        $product = Product::find($id);

        if(!$product) abort(404);

        $cart = session()->get('cart');
        // If the cart is empty then add this as the first product in the cart.
        if(!$cart){
            $cart = [
                $id=>[
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo,
                ]
            ];
            // Save the session called cart with the newly created array
            session()->put('cart',$cart);
            return redirect()->back()->with('Success',"Product added to cart");
        }

        // If the cart does exist do this -> No else if statement as the above if is acting as a guard clause and breaking out of this function
        // as it returns a redirect.
        // TODO: Handle the quantity
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo,
        ];
        session()->put('cart',$cart);
        return redirect()->back()->with('Success',"Product added to cart");

    }
}
