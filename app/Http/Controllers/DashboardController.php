<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\BookCollector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('dashboard',compact('user'));
    }

    public function profile(){
        $user = auth()->user();
        return view('components.dashboard.content.profile',compact('user'));

    }
    public function shared(){
        $user = auth()->user();
        return view('components.dashboard.content.shared',compact('user'));
    }
    public function favorites(){
        $user = auth()->user();
        return view('components.dashboard.content.favorites',compact('user'));
    }
    public function followers(){
        $user = auth()->user();
        return view('components.dashboard.content.followers',compact('user'));
    }
    public function following(){
        $user = auth()->user();
        return view('components.dashboard.content.following',compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookCollector $bookCollector)
    {
        $recommended_books = null;
        $current_books = auth()->user()->favorite_books->sortByDesc('created_at')->take(5)->values()->map(function ($book){
           return explode(' ', trim($book->info->title))[0];
        });
        if($current_books->count() > 0){
            $recommended_books = $bookCollector->retrieveRecommended(implode($current_books->toArray(),'+'));
        }
        return view('partials._recommended',compact('recommended_books'));

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
    public function update(Request $request, $id)
    {
        //
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
