<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Ship_address;
use App\Models\Ship_city;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShipController extends Controller
{

    public function DivisionView(){

        $city = Ship_city::orderBy('id','DESC')->get();

        return view('backend.ship.city.index',compact('city'));

    }

    public function DivisionStore(Request $request){

        $request->validate([
            'city' => 'required',

        ]);


        Ship_city::insert([

            'city' => $request->city,
            'created_at' => Carbon::now(),

        ]);

        $notification =  Toastr::success('inserted', 'success', ["positionClass" => "toast-top-right"]);

        return redirect()->back()->with($notification);

    } // end method

    public function DivisionEdit($id){

        $city = Ship_city::findOrFail($id);
        $any = $city->created_at->diffForHumans() ;
        
        return view('backend.ship.city.edit',compact('city'));
    }



    public function DivisionUpdate(Request $request,$id){

        Ship_city::findOrFail($id)->update([

            'city' => $request->city,
            'created_at' => Carbon::now(),

        ]);


        return redirect()->route('manage-cities');


    } // end mehtod


    public function DivisionDelete($id){

        Ship_city::findOrFail($id)->delete();



        return redirect()->back();

    } // end method

    public function DistrictView(){
        $city = Ship_city::orderBy('city','ASC')->get();
        $address = Ship_address::with('cities')->orderBy('id','DESC')->get();
        return view('backend.ship.address.index',compact('city','address'));
    }

    public function DistrictStore(Request $request){

        $request->validate([
            'city_id' => 'required',
            'address' => 'required',

        ]);


        Ship_address::insert([

            'city_id' => $request->city_id,
            'address' => $request->address,
            'created_at' => Carbon::now(),

        ]);



        return redirect()->back();

    } // end method



    public function DistrictEdit($id){

        $city = Ship_city::orderBy('city','ASC')->get();
        $address = Ship_address::findOrFail($id);
        return view('backend.ship.address.edit',compact('city','address'));
    }




    public function DistrictUpdate(Request $request,$id){

        Ship_address::findOrFail($id)->update([

            'city_id' => $request->city_id,
            'address' => $request->address,
            'created_at' => Carbon::now(),

        ]);



        return redirect()->route('manage-addresses');


    } // end method





    public function DistrictDelete($id){

        Ship_address::findOrFail($id)->delete();



        return redirect()->back();

    } // end method


}
