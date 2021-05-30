<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class followController extends Controller
{
   
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(User $user)
    {
        auth()->user()->toggleFollowing($user);
        return back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
