<?php

namespace App\Http\Controllers\back;

use App\Http\Requests\CreateBookRequest;
use App\Http\Controllers\Controller;
use App\Models\back\Book;
use App\Models\back\Category;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function index()
    {

        $books =Book::all();
        return view ('backend.books.all_book' ,compact('books'));

    }


    public function create()
    {
        $Book = Book::all();
        $category = Category::all();
        return view('backend.books.create',compact('Book','category'));
    }


    public function store(Request $request)
    {
        $books = new Book();
        $request->validate([
            'name'                   =>      'required',
            'description'            =>      'required',
            'price'                  =>      'required',
            'author'                 =>      'required',
            'category_id'            =>      'required',
            'published_date'         =>      'required',
            'quantity'               =>      'required',
            'image'                  =>      'required|mimes:jpeg,jpg,png',
        ]);


        $file = $request->file('image') ;
        $name_gen=hexdec(uniqid()).'.'. $file->getClientOriginalExtension();
        Image::make ($file)->resize(100,100)->save('uploads/books_images'.$name_gen);
        $save_url = 'uploads/books_images'.$name_gen;


        Book::insertGetId([
            'name'                => $request->name,
            'description'             => $request->description,
            'price'                   => $request->price,
            'author'                  => $request->author,
            'category_id'           => $request->category_id,
            'published_date'        => $request->published_date,
            'quantity'             => $request->quantity,
            'image'                 => $save_url
        ]);

        $notification =  Toastr::success('inserted', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('all.books')->with($notification);
    }


    public function show($id)
    {
        $book = Book::findOrFail($id)->first();

        return view('backend.books.show',compact('book'));
    }


    public function edit($id)
    {
        $book = Book::find($id);
        $category = Category::all();
        return view('backend.books.edit',compact('book','category'));
    }


    public function update(Request $request , $id)
    {

        $book = Book::findOrfail($id)->first();
        $request->validate([
            'name'                   =>      'required',
            'description'            =>      'required',
            'price'                  =>      'required',
            'author'                 =>      'required',
            'category_id'            =>      'required',
            'published_date'         =>      'required',
            'quantity'               =>      'required',
            'image'                  =>      'required|mimes:jpeg,jpg,png',
        ]);

        $file = $request->file('image') ;
        $name_gen=hexdec(uniqid()).'.'. $file->getClientOriginalExtension();
        Image::make ($file)->resize(100,100)->save('uploads/books_images'.$name_gen);
        $save_url = 'uploads/books_images'.$name_gen;

        $book->update([

            'name'              =>  $request->name,
            'description'       =>  $request->description,
            'author'            =>  $request->author,
            'category_id'       =>  $request->category_id,
            'price'             =>  $request->price,
            'image'             =>  $save_url,
            'quantity'          =>  $request->quantity,
            'published_date'    =>  $request->published_date

        ]);

        return redirect()->route('all.books');

    }


    public function destroy($id)
    {
        $book = Book::findOrfail($id);
        $book->delete();
        $notification =  Toastr::error('deleted', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('all.books')->with($notification);
    }

}
