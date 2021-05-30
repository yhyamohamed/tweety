<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index(){
       $tweets=auth()->user()->timeline();

        return view('home',['tweets'=>$tweets]);
    }

     public function store()
    {   
        request()->validate([
            'body'=>'required',
        ]);
        Tweet::create([
            'user_id'=>auth()->id(),
            'body'=>request('body')
        ]);
        return redirect('/tweets');
    }
}
