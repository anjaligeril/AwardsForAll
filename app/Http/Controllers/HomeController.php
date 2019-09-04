<?php

namespace App\Http\Controllers;

use App\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    /*home of user*/
    public function index()
    {
        $role = Auth::user()->role;
        $id=Auth::user()->id;
        // Check user role
        switch ($role) {
            case 'Admin':
                $awards=Award::all();
                return redirect('dashboard')->with ('allAwards',$awards);
                break;
            case 'user':
                $userAwards=Award::where('user_id','like',$id)->get();
                return view('home')->with('userAwards',$userAwards);
                break;
            default:
                return '/login';
                break;
        }
        return view('home');
    }

    /*admin home*/
    public function AdminIndex()
    {
        $awards=Award::all();
        return view('dashboard')->with ('allAwards',$awards);
    }


}
