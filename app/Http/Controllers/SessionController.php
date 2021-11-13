<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function store(Request $request){

        $attributes = $request->validate([
            'user' => ['required'],
            'password' => ['required']
        ]);

        $attributes['username'] = $attributes['user'] ;
        unset($attributes['user']);


        if(auth()->attempt($attributes)){
            return back()->with('success','Welcome back!');
        }

        return back()->
        withInput()->
        withErrors(['login'=>'Given credentials could not be verified.']);


//        throw ValidationException::withMessages([
//            'login' => 'Given credentials could not be verified.'
//        ]);

    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
    }
}
