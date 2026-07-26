<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Post extends Model implements HasMedia, Viewable
{
    use HasTranslations;
    use Sluggable;
    use InteractsWithMedia;
    use InteractsWithViews;

    protected $with = ['categories'];

    public array $translatable = ['title', 'description', 'content'];

    protected $fillable = ['title', 'description', 'content', 'published', 'user_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections(?Media $media = null): void
    {
        $this
            ->addMediaCollection('post-preview')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('small')
                    ->fit(Fit::Crop, 420, 280)
                    ->format('webp');
                $this
                    ->addMediaConversion('big')
                    ->fit(Fit::Crop, 672, 380)
                    ->format('webp');
            });

        $this
            ->addMediaCollection('post-content')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('big')
                    ->fit(Fit::Fill, 672, 500)
                    ->format('webp');
            });
    }


    public function getPreviewAttribute()
    {
        if (!$this->getMedia('post-preview')->isEmpty()) {
            return $this->getMedia('post-preview')[0]->getUrl('small');
        }
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
