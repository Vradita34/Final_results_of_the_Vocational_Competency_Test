<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PharIo\Manifest\Author;

class Books extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function genres() : BelongsToMany
    {
        return $this->belongsToMany(Genres::class,'book_genre','book_id','genre_id');
    }
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function author() : BelongsTo
    {
        return $this->belongsTo(Authors::class,'author_id');
    }

    public function publisher() : BelongsTo
    {
        return $this->belongsTo(User::class,'publisher_id');
    }
    public function collection() : BelongsTo
    {
        return $this->belongsTo(Collections::class,'book_id');
    }
    public function perizinans() : HasMany
    {
        return $this->HasMany(Perizinan::class,'book_id');
    }

    public function reviews() : HasMany
    {
        return $this->HasMany(Reviews::class,'book_id');
    }
}
