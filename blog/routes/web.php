<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('posts', [
        'posts' => Post::all()
    ]);
});


Route::get('posts/{post}', function ($id) { //Find by ID

    return view('post', [
        'post' => Post::findOrFail($id)
    ]);
});


//Coletion contoller -> ne go koristam sega

Route::get('/Collection', function () {


    $posts = collect(File::files(resource_path("posts")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($document) => new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        ));

    return view('posts', [
        'posts' => $posts
    ]);
});

//how to write better useful controller
/*FINd a post by its slag and pass it to a view called POST
  keywords: View, Post | find a post and pass it to the view*/


//this controller is working OK
/*Route::get('posts/{post}', function ($slug) {


    if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        return redirect('/');
    }

    $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));

    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');*/


/*
Route::get('/', function () {
    $document = YamlFrontMatter::parseFile(
        resource_path('posts/my-fourth-post.html')
    );
});*/
//Controller working OK YamlFrontMatter , vrakja od html --- ddd ----



