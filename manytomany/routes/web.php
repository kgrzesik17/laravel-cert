<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

Route::get('/', function () {
    return view('welcome');
});


// create a new role and assign it to the user in role_user lookup table
Route::get('/create', function() {

    $user = User::findOrFail(1);

    $role = new Role(['name'=>'Administrator']);

    $user->roles()->save($role);

});


// read all user roles
Route::get('/read', function() {

    $user = User::findOrFail(1);
    
    foreach($user->roles as $role) {
        echo $role->name . '<br>';
    }

});

// update role name if name = "Administrator"
Route::get('/update', function() {

    $user = User::findOrFail(1);

    // check if user has relationship
    if($user->has('roles')) {
        foreach($user->roles as $role) {
            if($role->name == 'Administrator') {
                $role->name = 'subscriber';
                $role->save();
            }
        }
    }

});


// delete role if name = "Administrator"
Route::get('/delete', function() {

    $user = User::findOrFail(1);
    $roles = $user->roles;

    foreach($user->roles as $role) {
        $role->whereName('Administrator')->delete();
    }

});


// attach user to said role (via role_user table) 
Route::get('/attach', function() {

    $user = User::findOrFail(1);

    // this will create another attachment even if one already exists
    $user->roles()->attach(8);

});


// detatch -||-
Route::get('/detatch', function() {

    $user = User::findOrFail(1);
    $user->roles()->detach(2);

});


// attach user to roles and delete all the others
Route::get('/sync', function() {

    $user = User::findOrFail(1);
    
    $user->roles()->sync([1, 2, 8]);

});