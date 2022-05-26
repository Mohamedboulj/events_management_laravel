<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users,email',
            'name' => 'required',
            'password' => 'required'
        ]);

        $user= new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password); //hashing password

        $user->save();
        return redirect('/')->with('status', 'registered!');



    }
    public function create(){
        return view('auth.authentification');

    }
    public function createLogin(){
        return view('auth.login');
    }



    public function checkUsers(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with(['user'=>Auth::user()]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }
    public function allusers(){
    $users = User::paginate(5);
    return view('dashboard.userslist',["users"=>$users]);
    }
    public function delete($id){
        //check if user id exists in db
        $user = User::find($id);

        if(!$user)
        return redirect()->back()->with(['error'=>'User don\'t exist']);
        $user->delete();
        return redirect()->back()->with(['success'=>'User deleted with success']);

    }



}
