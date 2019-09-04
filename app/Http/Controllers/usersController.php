<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function showUsers(){
        $allusers=User::where('role','user')->get();
        return view('showUsers')->with('allusers',$allusers);
    }
}
