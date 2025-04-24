<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Address;

Route::get('/', function () {
    return view('welcome');
});

// insert data into db
Route::get('/insert', function() {

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'3123 Paulina av NY NY 11218']);

    $user->address()->save($address);

});

// update data in db
Route::get('/update', function() {

    $address = Address::whereUserId(1)->first();
    $address->name = "4253 Update Av, Alaska";

    $address->save();

});


// read data from db
Route::get('/read', function() {

    $user = User::findOrFail(1);

    echo $user->address->name;

});


Route::get('/read/{id}', function($id) {

    $user = User::findOrFail($id);
    $addresses = $user->addresses;

    foreach($addresses as $address) {
        echo $address->name . "<br>";
    }

});


// delete data from db
Route::get('/delete', function() {

    $user = User::findOrFail(1);

    // if you want to use the method, you need to use parentheses
    $user->address()->delete();

});