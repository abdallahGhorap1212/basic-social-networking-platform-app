<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postSingUp(Request $request)
    {
        $email = $request['email'];
        $first_name = $request['first-name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;
        $user->save();
        return redirect()->back();
    }
    public function postSingIn(Request $request)
    {
    }
}
