<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Authors extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function books() : HasMany
    {
        return $this->hasMany(Books::class,'author_id');
    }
}
