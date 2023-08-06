<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\back\Book;
use App\Models\back\Category;
use App\Models\back\Order;
use App\Models\back\Order_item;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {

       return view('front.front_index');
    }

    public function book_by_category($id)
    {
        $books = Book::where('category_id',$id)->get();

        return view('front.books',compact('books'));
    }

    public function book_details($id)
    {
        $book = Book::find($id);

        return view('front.book_details',compact('book'));
    }

    public function userLogout()
    {

        Auth::logout();

        return redirect()->route('login');
    }

    public function order_static()
    {
        $order = Order::with('city', 'address', 'user')->where('user_id',Auth::id())->first();
        return view('front.static_order',compact('order'));
    }

    public function home_not()
    {

        $var = Order::where('user_id',Auth::id())->first();
        $date =  $var->created_at;
        $bo_date = $date->addDays(5);
        $car  = Carbon::now();
        $ss =  $bo_date->lessThan($car);

        
        if (!$ss)
        {
            $notification =  Toastr::success('inserted', 'success', ["positionClass" => "toast-top-center"]);
            return view('front.index')->with($notification);
        }else
        {
            return view('front.index');
        }


    }
}
