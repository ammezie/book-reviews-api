<?php

namespace App\Http\Controllers;

use App\Book;
use App\Rating;
use Illuminate\Http\Request;
use App\Http\Resources\RatingResource;

class RatingController extends Controller
{
    /**
     * Store a newly created rating in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        $rating = Rating::firstOrCreate(
            [
                'user_id' => auth()->user()->id,
                'book_id' => $book->id,
            ],
            ['rating' => $request->rating]
        );

        return new RatingResource($rating);
    }
}
