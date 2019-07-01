<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\RegisterUserRequest;
use App\User;
use Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function getLogin() {
        return view('client.login');
    }

    public function postLogin(Request $request) {
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->email;
            $password = $request->password;

            if(Auth::attempt(['email' => $email, 'password' =>$password])) {
                $user = Auth::user();
                if($user->type == "User") {
                    return redirect()->route('home');
                } else {
                    return redirect()->route('admin.index');
                }
                return redirect()->intended('/');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email or password does not match']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    public function getRegister() {
        return view('client.register');
    }

    public function postRegister(RegisterUserRequest $request) {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = $user->getDefaultType();
        $user->save();
        session()->flash("success", "Success");
        return redirect()->route('getLogin');
    }
}
