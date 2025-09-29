<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topic_id',
        'published',
        'title',
        'slug',
        'description',
        'content',
        'category_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Scope a query to only include published posts.
     * https://www.scratchcode.io
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published', '=', true);
    }

}
