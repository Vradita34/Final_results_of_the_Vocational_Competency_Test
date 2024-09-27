<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reviews extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function book() : BelongsTo
    {
        return $this->belongsTo(Books::class,'book_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
