<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\UserVote;
use Illuminate\Http\Request;

class UserVoteController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserVote  $userVote
     * @return \Illuminate\Http\Response
     */
    public function show(UserVote $userVote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserVote  $userVote
     * @return \Illuminate\Http\Response
     */
    public function edit(UserVote $userVote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $vote = UserVote::where('user_id',auth()->user()->id)->where('review_id',$request->get('id'))->first();

        $review = Review::find($request->get('id'));


        if($request->get('type') === 'like'){
            if(! is_null($vote) && !($vote->upvote)){ // meaning they originally disliked
                $vote->upvote = 1;
                $vote->downvote = 0;

                $review->increment('upvote');
                $review->decrement('downvote');
                $vote->save();

                return response()->json(['Removed dislike added like.']);


            }
            else if (! is_null($vote)  && $vote->upvote){ // they already liked then remove like
                $vote->delete();
                $review->decrement('upvote');
                return response()->json(['Removed like.']);

            }

            else if(is_null($vote)){ // meaning they haven't liked or disliked
                UserVote::create([
                    'user_id' => auth()->user()->id,
                    'review_id' => $request->get('id'),
                    'upvote' => 1
                ]);
                $review->increment('upvote');

                return response()->json(['Liked.']);

            }
            return response()->json(['Nothing fit.[like]']);



        }
        elseif($request->get('type') === 'dislike'){

            if(! is_null($vote) && !($vote->downvote)){ // meaning they originally liked
                $vote->downvote = 1;
                $vote->upvote = 0;

                $review->increment('downvote');
                $review->decrement('upvote');
                $vote->save();

                return response()->json(['Removed like added dislike.']);

            }
            else if(! is_null($vote)  && $vote->downvote){ // they already disliked then remove disliked
                $vote->delete();
                $review->decrement('downvote');

                return response()->json(['Removed dislike.']);

            }

            else if(is_null($vote)){ // meaning they haven't liked or disliked
                UserVote::create([
                    'user_id' => auth()->user()->id,
                    'review_id' => $request->get('id'),
                    'downvote' => 1
                ]);
                $review->increment('downvote');

                return response()->json(['Disliked']);

            }
            return response()->json(['Nothing fit.[dislike]']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserVote  $userVote
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVote $userVote)
    {
        //
    }
}
