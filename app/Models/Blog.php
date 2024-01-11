<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{

    public function __construct(public $title, public $slug, public $intro, public $body, public $created_at)
    {
    }

    public static function all()
    {
        $path = resource_path('blogs/'); //all blogs folder path
        $blogs = collect(File::files($path))->map(function ($fileObj) {
            $yamlObj = YamlFrontMatter::parse($fileObj->getContents());
            return new Blog($yamlObj->title, $yamlObj->slug, $yamlObj->intro, $yamlObj->body(), $yamlObj->created_at);
        });
        return $blogs; //collection
    }

    public static function find($slug)
    {
        $blogs = static::all();
        return $blogs->where('slug', $slug)->first(); //object
    }
}
