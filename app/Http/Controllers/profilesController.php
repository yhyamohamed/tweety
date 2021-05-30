<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class profilesController extends Controller
{

   public function show(User $user)
   {
      return view('profiles',compact('user'));
   }
}
