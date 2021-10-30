<?php

namespace App\Http\Controllers;

use App\Services\BookCollector;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SearchItemsController extends Controller
{
    # Retrieve all books matching given query

    public function index(BookCollector $bookCollector)
    {
        $items = $bookCollector->retrieveAll(request()->get('item'));

        return view('search',compact('items'));

    }

    #Retrive a specific book

    public function show(BookCollector $bookCollector){
        $item = $bookCollector->retrieveSpecific(request()->get('id'));
        return view('book',compact('item'));

    }

}
