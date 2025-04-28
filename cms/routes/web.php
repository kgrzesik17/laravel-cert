<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/contact', function() {
//     return "hi I am contact";
// });


// Route::get('/post/{id}/{name}', function($id, $name) {
//     return "This is post number " . $id . " " . $name;
// });


// // NAMING ROUTES
// Route::get('/admin/posts/example', array('as'=>'admin.home', function() {

//     $url = route('admin.home');

//     return "this is " . $url;

// }));


// // route to controller and passing data
// Route::get('/post/{id}', 'PostsController@index');


// Route::resource('posts', 'PostsController');

// Route::get('/contact', 'PostsController@contact');

// Route::get('post/{id}/{name}', 'PostsController@show_post');




// Route::get('/insert', function() {
//     DB::insert('insert into posts(title, content) values (?, ?)', ['PHP with Laravel', 'Laravel is the best thing that has happened to PHP']);
// });


// Route::get('/read', function () {
//     $result = DB::select('select * from posts where id = ?', [1]);
//     var_dump($result);
// });


// Route::get('/update', function() {
//     $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);
//     return $updated;
// });


// Route::get('/delete', function() {
//     $deleted = DB::delete('delete from posts where id = ?', [1]);
//     return $deleted;
// });


// ELOQUENT

// Route::get('/find', function() {

//     $post = Post::find(2);

//     return $post->title;

// });


// Route::get('/findwhere', function() {

//     $posts = Post::where('id', 3)->orderBy('id', 'desc')->take(1)->get();

//     return $posts;

// });


// Route::get('/findmore', function() {

//     // $posts = Post::findOrFail(1);

//     // return $posts;

//     $posts = Post::where('users_count', '<', 50)->firstOrFail();

// });


// Route::get('/basicinsert', function() {

//     $post = new Post;

//     $post->title = 'new title';
//     $post->content = 'new content';

//     $post->save();   

//  });


// Route::get('/create', function() {
//     Post::create(['title'=>'create method', 'content'=>'wow i am learning a lot']);
// });


// Route::get('/update', function() {
//     Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'new php title', 'content'=>'i dont know about that bruh']);
// });

// Route::get('/delete', function() {
//     $post = Post::find(2);
//     $post->delete();
// });

// Route::get('/delete2', function() {
//     Post::destroy([4, 5]);

//     // Post::where('is_admin', 0)->delete();
// });



// Route::get('/softdelete', function() {
//     Post::find(6)->delete();
// });

// Route::get('/readsoftdelete', function() {
//     // $post = Post::findOrFail(7);
//     // return $post;

//     $post = Post::withTrashed()->where('is_admin', 0)->get();
//     return $post;

//     // $post = Post::onlyTrashed()->where('is_admin', 0)->get();
//     // return $post;
// });

// Route::get('/restore', function() {
//     Post::withTrashed()->where('is_admin', 0)->restore();
// });

// delete permanently
// Route::get('/forcedelete', function() {
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });


// ELOQUENT RELATIONSHIPS

// // one to one
// Route::get('/user/{id}/post', function($id) {
//     return User::findOrFail($id)->post->title;
// });

// // inverted one to one
// Route::get('/post/{id}/user', function($id) {
//     return Post::findOrFail($id)->user;
// });

// // one to many
// Route::get('/posts', function() {
//     $user = User::findOrFail(1);

//     foreach($user->posts as $post) {
//         echo $post->title . '<br>';
//     };
// });

// // many to many
// Route::get('/user/{id}/roles', function($id) {
//     $user = User::findOrFail($id)->orderBy('id', 'desc')->get();

//     return $user;

//     // foreach($user->roles as $role) {
//     //     echo $role->name . '<br>';
//     // }
// });

// // accessing the pivot table
// Route::get('user/pivot', function() {
//     $user = User::findOrFail(1);

//     foreach($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }
// });

// // post of users with country_id = 1
// Route::get('/user/country', function() {
//     $country = Country::find(1);

//     foreach($country->posts as $post) {
//         return $post->title;
//     }
// });



// Polymorphic relations
// Route::get('user/photos', function() {
//     $user = User::findOrFail(1);

//     foreach($user->photos as $photo) {
//         echo $photo;
//     }
// });

// Route::get('post/photos', function() {
//     $post = Post::findOrFail(1);

//     foreach($post->photos as $photo) {
//         echo $photo;
//     }
// });

// Route::get('photo/{id}/post', function($id) {
//     $photo = Photo::findOrFail($id);

//     return $photo->imageable;
// });


// polymorphic many to many
 
// Route::get('/post/tag', function() {
//     $post = Post::find(1);

//     foreach($post->tags as $tag) {
//         echo $tag->name;
//     }
// });

// Route::get('/tag/post', function() {
//     $tag = Tag::find(2);

//     foreach($tag->posts as $post) {
//         echo $post->title;
//     }
// });



// CRUD APPLICATION

Route::resource('/posts', 'PostsController');  // resource's gonna give us pre-defined route names and URI's