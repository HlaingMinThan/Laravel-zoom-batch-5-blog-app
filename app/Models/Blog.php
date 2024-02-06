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
}
