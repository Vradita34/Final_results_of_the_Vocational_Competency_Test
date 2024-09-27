<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genres extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function books() : BelongsToMany
    {
        return $this->belongsToMany(Books::class,'book_genre','book_id','genre_id');
    }
}
