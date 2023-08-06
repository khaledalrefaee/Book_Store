<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\back\Book;
use App\Models\Ship_address;
use App\Models\Ship_city;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {


        $product = Book::findOrFail($id);

            Cart::add([
                'id' => $id,
                'name' => $request->name,
                'price' => $product->price,
                'weight' => 1,
                'qty' => 1,
                'options' => [
                    'image' => $product->image,
                    ]

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
    }

    public function myCart()
    {
        $cart_content = Cart::content();
        $cartQty = Cart::content()->count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'cart_content' => $cart_content,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,

        ));
    }

    public function cartPage()
    {
        return view('front.cart');
    }

    public function cartRemove($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);
    }


        public function CheckoutCreate(){

        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();


                $cities = Ship_city::orderBy('city','ASC')->get();
                return view('front.checkout',compact('carts','cartQty','cartTotal','cities'));


            }else{
                return redirect()->to('/');
            }

        }else{
            return redirect()->route('login');
        }

    } // end method



}
