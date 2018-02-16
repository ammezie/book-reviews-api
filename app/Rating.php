<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * Attributes that can be mass assigned
     *
     * @var array
     */
    protected $fillable = ['book_id', 'user_id', 'rating'];

    /**
     * A rating belongs to a book
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the user that owns the rating
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
