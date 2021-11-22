<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Services\BookCollector;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SearchItemsController extends Controller
{
    # Retrieve all books matching given query

    public function index(BookCollector $bookCollector)
    {
        $items = $bookCollector->retrieveAll(request()->get('item'),[],Book::all()->toArray());


        return view('search',compact('items'));

    }

    #Retrive a specific book

    public function show(BookCollector $bookCollector){
        $item = Book::firstWhere('volume_id',request()->get('volume_id'));

        if(!$item){
            $item = $bookCollector->retrieveSpecific(request()->get('volume_id'));
            $reviews = null;
        }
        else{
            $reviews = $item->reviews()->with('user')->orderBy('created_at','desc')->paginate(3)->withQueryString();

        }
        return view('book',compact('item','reviews'));

    }

}
