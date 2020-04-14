<?php

namespace App\Http\Controllers;

use App\Poll;
use App\vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Poll::orderBy('id', 'desc')->get();
        return view('/poll.running', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pollcreate = Poll::create($this->validateRequest());
        $this->storedImage1($pollcreate);
        $vote= new vote();
        $vote->poll_id = Poll::latest()->first()->id;
        $vote->save();
        $str=Auth::User()->name;
        $result = md5($str);
        $url = 'pollingsite.bikaneritadka.com/welcome/'.$result.'&'.$vote->poll_id;
        Session::put('url', $url);
        return back()->with('status', $url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        return view('/welcome', compact('poll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        //
    }
    private function validateRequest()
    {
        return request()->validate([
          'question' => 'required | string',
          'image1' => '',
          'image2' => '',
          'image3' => '',
          'image4' => '',
          'name' => 'required | string',
      ]);
    }
    private function storedImage1($image)
    {
        if(request()->hasfile('image1')){
            $file = request()->file('image1');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/poll/image1".time().'.'.$extension;
            $file->move(public_path("../public/images/poll"), $filename);
            $image->image1 = $filename;
            $image->save();
        }
    
        if(request()->hasfile('image2')){
            $file = request()->file('image2');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/poll/image2".time().'.'.$extension;
            $file->move(public_path("../public/images/poll"), $filename);
            $image->image2 = $filename;
            $image->save();
        }
        if(request()->hasfile('image3')){
            $file = request()->file('image3');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/poll/image3".time().'.'.$extension;
            $file->move(public_path("../public/images/poll"), $filename);
            $image->image3 = $filename;
            $image->save();
        }
        if(request()->hasfile('image4')){
            $file = request()->file('image4');
            $extension = $file->getClientOriginalExtension();
            $filename = "/images/poll/image4".time().'.'.$extension;
            $file->move(public_path("../public/images/poll"), $filename);
            $image->image4 = $filename;
            $image->save();
        }
    }
}
