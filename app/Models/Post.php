<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kalnoy\Nestedset\NodeTrait;

class Post extends Model
{
    use HasFactory, NodeTrait;

    protected $fillable = [
        'user_id',
        'topic_id',
        'category_id',
        'parent_id',
        'title',
        'slug',
        'description',
        'content',
        'published',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function forum(){
        return $this->belongsToThrough(Topic::class, Forum::class, 'topic_id', 'id', 'id');
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
