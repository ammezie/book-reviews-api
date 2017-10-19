<?php

namespace App\Http\Resources;

use App\Book;
use Illuminate\Http\Resources\Json\Resource;

class BookResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'average_rating' => $this->averageRating(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'ratings' => $this->ratings,
        ];
    }
}
