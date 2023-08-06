<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Category;
use App\Models\back\Order;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('backend.category.create',compact('category'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name'           =>  'required',
            'icon'           =>  'required',

        ]);

        category::create([
            'name'          =>  $request->name,
            'icon'          =>  $request->icon,

        ]);
        return redirect()->route('Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {

        $category = category::findOrFail($id)->first();

        $notification =  Toastr::success('inserted', 'success', ["positionClass" => "toast-top-center"]);

        return view('backend.category.show',compact('category'))->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id)->first();

        $request->validate([
            'name'           =>  'required',
            'icon'           =>  'required',

        ]);


        $category->update([
            'name'                     =>      $request->name,
            'icon'                     =>      $request->icon
        ]);
        return redirect()->route('Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = category::findOrfail($request->id);
        $category->delete();
        return redirect()->route('Category');
    }
}
