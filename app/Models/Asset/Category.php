<?php

namespace App\Models\Asset;

use App\Models\Meme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function memes(): HasMany
    {
        return $this->hasMany(Meme::class);
    }
}
