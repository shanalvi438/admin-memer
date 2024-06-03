<?php

namespace App\Models;

use App\Models\Asset\Category;
use App\Models\Asset\SubCategory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Meme extends Model implements HasMedia
{
    use HasTags, HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    protected $with = ['category','tags'];

    protected array $apend = ['imageUrl'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMedia('image')->original_url,
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
