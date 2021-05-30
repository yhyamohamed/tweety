<?php

use App\Http\Controllers\followController;
use App\Http\Controllers\profilesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/tweets',[TweetController::class,'index']) ->name('tweets');

    Route::Post('/tweets',[TweetController::class,'store'])->name('add_tweet');
    
    Route::post('/profiles/{user:name}/follow',[followController::class,'store'])->name('follow');
});

Route::get('/profiles/{user:name}',[profilesController::class,'show'])->name('profile');
