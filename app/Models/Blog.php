<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    //mass assignment issue
    protected $fillable = ['title', 'slug', 'intro', 'body'];

    public function category() //category_id
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($q, $filters)
    {
        $q->when($filters['search'] ?? null, function ($q) use ($filters) {
            $q->where(function ($q) use ($filters) {
                $q->where('title', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
            });
        })
            ->when($filters['username'] ?? null, function ($q) use ($filters) {
                $q->whereHas('author', function ($q) use ($filters) {
                    $q->where('username', $filters['username']);
                });
            })
            ->when($filters['category'] ?? null, function ($q) use ($filters) {
                $q->whereHas('category', function ($q) use ($filters) {
                    $q->where('id', $filters['category']);
                });
            });
    }
    //a  blog has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscribedUsers()
    {
        return $this->belongsToMany(User::class, 'blog_user');
    }
}
