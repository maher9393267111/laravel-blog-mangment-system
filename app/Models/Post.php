<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'titel',
        'description',
        'content',
        'image',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        // Array of Tags for single Post 
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId)
    {
        return in_array( $tagId , $this->tags->pluck('id')->toArray());
    }
}
