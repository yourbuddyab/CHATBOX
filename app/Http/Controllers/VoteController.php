<?php

namespace App\Http\Controllers;

use App\Poll;
use App\vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function pollvote($id)
    {
        $pollid=explode("&",$id)[1];
        $poll=Poll::where('id',$pollid)->first();
        return view('/welcome',compact('poll'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vote $vote)
    {
        $usercount = count(Poll::where('name', $request->named)->get());
        $userid = Poll::where('name', $request->named)->get();
        $str=$request->named;
        $result = md5($str);
        $count = count(Poll::all());
        $question = intval($request->question_id);
        $vote->total = (int)$vote->total +1;
        if(!empty($request->vote1)){
            $vote->image1 = (int)$vote->image1 +1;
            $vote->save();
        }elseif(!empty($request->vote2)){
            $vote->image2 = (int)$vote->image2 +1;
            $vote->save();
        }elseif(!empty($request->vote3)){
            $vote->image3 = (int)$vote->image3 +1;
            $vote->save();
        }else{
            $vote->image4 = (int)$vote->image4 +1;
            $vote->save();
        }
        if($question == $count){
            return redirect('/poll')->with('status', 'Your All Vote Cast!! Check Current Candition!!');
        }else{
            $url = $question+1;
            return redirect('/welcome/'.$result.'&'.$url);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(vote $vote)
    {
        //
    }
}
