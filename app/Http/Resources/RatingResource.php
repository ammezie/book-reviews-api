<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RatingResource extends Resource
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
            'user_id' => $this->user_id,
            'book_id' => $this->book_id,
            'rating' => $this->rating,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'book' => $this->book,
        ];
    }
}
