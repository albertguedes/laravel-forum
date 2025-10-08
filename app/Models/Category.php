<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'description',
        'is_active',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the posts of the current category.
     *
     * @param bool $published
     * @return HasMany
     */
    public function posts($published = false): HasMany
    {
        $query = $this->hasMany(Post::class)->orderBy('title','ASC');

        if ($published) {
            $query->where('published', true);
        }

        return $query;
    }

    /**
     * Scope a query to only include categories that have published posts.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeWithPublishedPosts(Builder $query): Builder
    {
        return $query->whereHas('posts', function (Builder $query) {
            $query->where('published', true);
        });
    }

    /**
     * Scope a query to only include active posts.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsActive(Builder $query): Builder
    {
        return $query->where('is_active', '=', true);
    }
}
