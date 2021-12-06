<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::with('followers')->where('username','like','%' . request()->get('username') . '%')->get();

        return view('partials._users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->validateWithBag('register',[
            'username' => ['required','max:255','min:3',Rule::unique('users','username')],
            'email' => ['required','email','max:255',Rule::unique('users','email')],
            'password' => ['required','max:255','min:5']
        ]));

        auth()->login($user);

        return back()->with('success','Your account has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        if($request->has('avatar')){
            $request->validate([
                'avatar' => ['required','image','different:$user->avatar']
            ]);
            $path = $request->file('avatar')->store('avatars');
            $user->avatar = $path;
            $user->save();
            return response()->json($path);

        }
        elseif ($request->has('about_me')){
//            $request->validate([
//                'about_me' => ['required']
//            ]);

            $user->about_me = $request->get('about_me');
            $user->save();

            return response()->json($request->get('about_me'));






        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
