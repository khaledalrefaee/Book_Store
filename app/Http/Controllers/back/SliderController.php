<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\back\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.sliders',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Slider::all();
        return view('backend.slider.create',compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'url'   =>   'required',
        ]);


        $file = $request->file('url') ;
        $name_gen=hexdec(uniqid()).'.'. $file->getClientOriginalExtension();
        Image::make ($file)->resize(100,100)->save('uploads/slider_images'.$name_gen);
        $save_url = 'uploads/slider_images'.$name_gen;


        Slider::insert([

            'url'    => $save_url,
            ]);
        return redirect()->route('all.sliders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::findOrFail($id)->first();

        return view('backend.slider.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $slider = Slider::findOrFail($id)->first();

        return view('backend.slider.edit',compact('slider'));
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
        $slider = Slider::findOrfail($id)->first();

        $oldImage = $request->old_img;
        unlink($oldImage);
        $image = $request->file('url');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/slider_images'.$name_gen);
        $save_url = 'uploads/slider_images'.$name_gen;

        $slider->update([

            'url'              =>  $save_url,


        ]);
        return redirect()->route('all.sliders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Slider::findOrfail($id);
        $book->delete();
        return redirect()->route('all.sliders');
    }
}
