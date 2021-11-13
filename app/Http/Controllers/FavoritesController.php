<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\FavoritedBook;
use Illuminate\Http\Request;


class FavoritesController extends Controller
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

        $db_book = Book::updateOrCreate(
            $request->except('_token','thumbnail'),
            ['thumbnail' => $request->get('thumbnail')]
        );

        if(FavoritedBook::where('user_id',auth()->user()->id)->where('book_id',$db_book->id)->exists()){
            $message = "'" . $db_book->title . "'" . ' is already in your favorites';
        }
        else{
            FavoritedBook::create(['user_id' => auth()->user()->id,'book_id' => $db_book->id]);
            $message = "'" . $db_book->title . "'" . ' was added to your favorites';
        }
        return back()->with('message', $message);
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
