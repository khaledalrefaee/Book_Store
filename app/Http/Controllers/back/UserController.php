<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('backend.users.all_users',compact('users'));
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('backend.users.show',compact('user'));
    }



    public function destroy(Request $request)
    {
        $user = User::findOrfail($request->id);
        $user->delete();
        return redirect()->route('all.users');
    }
}
