<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\SharedBook;
use App\Models\User;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = collect([]);

        if(strlen($request->get('user')) > 0){
            $users = auth()->user()->following->filter(function ($user) use ($request) {
                return false !== stripos($user->username,$request->get('user'));
            });
        }
        if($users->count() > 0){
            return view('partials._share',compact('users'));
        }
        else{
            return response()->json(['Error'=>'Sorry no users found.'],404);

        }

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
        $id = $request->get('id');
        if(! isset($id)){
            $book = Book::updateOrCreate(
                $request->except('_token','thumbnail','share'),
                [
                    'thumbnail' => $request->get('thumbnail'),
                    'link' => $request->get('link')
                ]
            );
            collect($request->get('share'))->each(function ($relation) use ($book) {
                if(isset($relation['person'])){
                    SharedBook::create([
                        'book_id' => $book->id,
                        'user_id' => auth()->user()->id,
                        'shared_with_user_id' => $relation['person'],
                        'message' => $relation['message']
                    ]);
                }

            });
        }
        else{
            collect($request->get('share'))->each(function ($relation) use ($id) {
                if(isset($relation['person'])) {
                    SharedBook::create([
                        'book_id' => $id,
                        'user_id' => auth()->user()->id,
                        'shared_with_user_id' => $relation['person'],
                        'message' => $relation['message']
                    ]);
                }
            });
        }
        return back()->with(['success'=>'Sucessfully shared.']);
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
