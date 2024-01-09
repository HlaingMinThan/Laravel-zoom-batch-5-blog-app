<?php

namespace App\Models;

class Blog
{
    public static function find($filename)
    {
        $path = resource_path('blogs/' . $filename . '.html');
        if (file_exists($path)) {
            $blog = file_get_contents($path);
            return $blog;
        } else {
            abort(404);
        }
    }
}
