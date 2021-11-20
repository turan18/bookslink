<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Services\BookCollector;
use Illuminate\Http\Request;

class LoadMore extends Controller
{
    public function index(BookCollector $bookCollector){
        //Return a partial
        //we need book title and startingIndex

        $items = $bookCollector->retrieveAll(request()->get('item'),['startIndex' => request()->get('index')],Book::all()->toArray());

        return view('partials.load-more._books',compact('items'));
    }
}
