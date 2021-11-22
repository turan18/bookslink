<?php

namespace App\Http\Controllers;

use App\Models\Follow;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'user_id' => Rule::unique('follows')->where(function($query) use ($request) {
                return $query->where('user_id',auth()->user()->id);
            })
        ]);

        $follow_this_user = User::where('id',$request->get('user_id'))->get();
        auth()->user()->following()->attach($follow_this_user,['followed_at'=>now(),'updated_at'=>now()]);


        return response()->json(['Success'=>'Followed'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
//     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $unfollow_this_user = User::where('id',$request->get('user_id'))->get();

        auth()->user()->following()->detach($unfollow_this_user);

        return json_encode(['Success'=>'Unfollowed']);
    }
}
