<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\back\Order;
use App\Models\back\Order_item;
use App\Models\Ship_address;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($city_id){

        $ship = Ship_address::where('city_id',$city_id)->orderBy('address','ASC')->get();
        return json_encode($ship);

    } // end method


    public function CheckoutStore(Request $request){


        $cartTotal = Cart::total();

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'city_id' => $request->city_id,
            'address_id' => $request->address_id,
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            'phone' => $request->shipping_phone,
            's_address'=>$request->s_address,
            'amount'=> $cartTotal,
            'payment_type' => 'Cache on delivery',
            'invoice_no' => 'EKB'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);

        $carts = Cart::content();
        foreach ($carts as $cart) {
            Order_item::insert([
                'order_id' => $order_id,
                'book_id' => $cart->id,
                'price' => $cart->price,
                'created_at' => Carbon::now(),

            ]);
        }

        Cart::destroy();



        return view('front.process');





    }
}
