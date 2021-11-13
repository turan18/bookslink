<?php

namespace App\Http\Controllers;
use App\Services\BookCollector;
use Illuminate\Http\Request;

class LoadMore extends Controller
{
    public function index(BookCollector $bookCollector){
        //we need book title and startingIndex

        $items = $bookCollector->retrieveAll(request()->get('item'),['startIndex' => request()->get('index')]);

        return view('partials.load-more._books',compact('items'));
    }
}
