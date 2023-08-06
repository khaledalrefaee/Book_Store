<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Order;
use App\Models\back\Order_item;
use App\Models\Ship_address;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function PendingOrders(){
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));

    } //

    public function PendingOrdersDetails($order_id)
    {

        $order = Order::with('city', 'address', 'user')->where('id', $order_id)->first();
        $orderItem = Order_Item::with('book')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders_details', compact('order', 'orderItem'));
    }


    public function pickedOrdersDetails($order_id)
    {

        $order = Order::with('city', 'address', 'user')->where('id', $order_id)->first();
        $orderItem = Order_Item::with('book')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders_details', compact('order', 'orderItem'));
    }


    // Confirmed Orders
    public function ConfirmedOrders(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));

    } // end


    // Picked Orders
    public function PickedOrders(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders'));

    } // end



    // Shipped Orders
    public function ShippedOrders(){
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders'));

    } // end


    // Delivered Orders
    public function DeliveredOrders(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));

    } // end


    public function PendingToConfirm($order_id){

        Order::findOrFail($order_id)->update(['status' => 'confirm']);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pending-orders')->with($notification);


    } // end method


    public function ConfirmToPicked($order_id){

        Order::findOrFail($order_id)->update(['status' => 'picked']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed-orders')->with($notification);


    } // end method



    public function PickedToShipped($order_id){

        Order::findOrFail($order_id)->update(['status' => 'shipped']);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-orders')->with($notification);


    } // end method


    public function ShippedToDelivered($order_id){

        Order::findOrFail($order_id)->update(['status' => 'delivered']);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped-orders')->with($notification);


    } // end method



        //Pdf

    public function AdminInvoiceDownload($order_id){

        $order = Order::with('city', 'address', 'user')->where('id',$order_id)->first();
        $orderItem = Order_Item::with('book')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    } // end method
}
