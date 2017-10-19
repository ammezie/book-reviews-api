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
    protected $fillable = ['title', 'description'];

    /**
     * A book a can have many ratings
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
