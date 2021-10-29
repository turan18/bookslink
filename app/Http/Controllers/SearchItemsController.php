<?php

namespace App\Http\Controllers;

use App\Services\BookCollector;
use Illuminate\Http\Request;

class SearchItemsController extends Controller
{
    # Single action Controller that retrieves a sanitized array of books.

    public function __invoke(BookCollector $bookCollector)
    {
        $items = $bookCollector->retrieve(request()->get('item'));

        return view('search',["items" => $items]);

    }
}
