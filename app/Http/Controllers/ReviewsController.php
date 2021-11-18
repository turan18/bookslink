<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
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





        $book = Book::updateOrCreate($request->except('_token','review','rating','thumbnail'),['thumbnail' => $request->get('thumbnail')]);



        $sum = Review::where('book_id',$book->id)->sum('rating');
        $count = Review::where('book_id',$book->id)->count() + 1;


        $new_avg = floor(($sum + (int) $request->get('rating')) / $count);



        $book->update(['full_rating' => $new_avg]);



        $review = Review::where('user_id',auth()->user()->id)
                          ->where('book_id',$book->id)
                          ->first();




        if(! $review){
            Review::create([
                'user_id' => auth()->user()->id,
                'book_id' => $book->id,
                'rating' => $request->get('rating'),
                'review_body' => $request->get('review')
            ]);
        }
        else{
            return back()->withErrors(['errors' => 'You have already reviewed this book.']);
        }


        return back()->with(['success' => 'Your review has been added.']);
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
