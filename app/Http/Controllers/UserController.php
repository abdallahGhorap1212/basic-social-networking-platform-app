<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function postSingUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first-name' => 'required|max:120',
            'password' => 'required|min:6',
        ]);
        $email = $request['email'];
        $first_name = $request['first-name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;
        $user->save();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    // public function postSingUp(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|unique:users',
    //         'first_name' => 'required',
    //         'password' => 'required|min:6',
    //     ]);
    //     // $email = $request['email'];
    //     // $first_name = $request['first-name'];
    //     // $password = Hash::make($request['password']);

    //     $user = new User();
    //     $user->email = $request->input('email');
    //     $user->first_name = $request->input('first_name');
    //     $user->password = Hash::make($request->input('password'));
    //     $user->save();
    //     return redirect()->back();
    // }
    public function postSingIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }
    public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:120',
        ]);
        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['first_name'] . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('account');
    }
    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}