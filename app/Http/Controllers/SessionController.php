<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function store(Request $request){

        $attributes = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(auth()->attempt($attributes)){
            return back()->with('success','Welcome back!');

        }

        throw ValidationException::withMessages([
            'username' => 'Given credentials could not be verified.'
        ]);

    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
    }
}
