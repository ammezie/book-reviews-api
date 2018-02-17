<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Attributes that can be mass assigned
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'description'];

    /**
     * A book is belongs to a user
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A book a can have many ratings
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Calculate the average rating on a book
     *
     * @return integer
     */
    public function averageRating()
    {
        $ratings = $this->ratings;

        if (!$ratings->isEmpty()) {
            $sum = 0;

            foreach ($ratings as $rating) {
                $sum += $rating->rating;
            }

            return $sum / $ratings->count();
        }
    }
}
