<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function() {

    $post = Post::create(['name'=>'My first post']);
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);
    
    $video = Video::create(['name'=>'video.mov']);
    $tag2 = Tag::find(2);
    $video->tags()->save($tag2);

});



Route::get('/createtag', function() {

    Tag::create(['name'=>'posts'])->save();
    Tag::create(['name'=>'videos'])->save();

});



Route::get('/read', function() {

    $post = Post::findOrFail(6);

    foreach($post->tags as $tag) {

        echo $tag;

    }

});



Route::get('update', function() {

    // $post = Post::findOrFail(6);

    // foreach($post->tags as $tag) {
    //     return $tag->whereName('posts')->update(['name'=>'updated posts']);
    // }

    $post = Post::findOrFail(6);
    $tag = Tag::find(1);

    // $post->tags()->save($tag);

    // $post->tags()->attach($tag);

    // $post->tags()->sync([1, 2]);

});



Route::get('delete', function() {

    $post = Post::findOrFail(6);

    foreach($post->tags as $tag) {

        $tag->whereId(1)->delete(); 

    }

});