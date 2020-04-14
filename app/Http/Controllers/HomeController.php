<?php

namespace App\Http\Controllers;

use App\Poll;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = User
        $member = User::all();
        return view('home', compact('member'));
    }
    public function search(Request $request)
    {
        // dd($request->);
        $member = User::all();
        $user = User::where('name', $request->search)->get();
        // Session::put('result', $user);
        return view('user.result', compact('user', 'member'));
    }
    public function welcome()
    {
        $poll = Poll::orderBy('id', 'desc')->get();
        return view('/welcome', compact('poll'));
    }
}
