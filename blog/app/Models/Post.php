<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title; //my first Post => my-first=post
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    /**
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     */
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()  //find all JS
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortByDesc('date');
        });

    }

    public static function find($slug)
    {
        //of all the blog posts, find the one with a slug that matches the one that was requested.
        //gi zema site postovi pa gi baraa po slug
        return static::all()->firstWhere('slug', $slug);
    }


    /* public static function find($slug) //kako find by ID JS
     {
         //base_path();
         if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
             throw new ModelNotFoundException;
         }
         return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));

     }*/

}
