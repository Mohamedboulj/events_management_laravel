<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        $user= new User();
        $user->email = $request->email;
        $user->password = $request->user()->fill([
            'password' => Hash::make($request->newPassword)])->save();
        $user->save();
        return redirect('/')->with('status', 'registered!');



    }
    public function create(){
        return view('authentification');
    }
}
