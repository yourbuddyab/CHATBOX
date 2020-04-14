<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function profile()
  {
      $member = User::all();
      $userData = User::where('id', Auth::User()->id)->first();
      return view('user.profile', compact('userData', 'member'));
  }

  public function profileUpdate(Request $request)
  {
        Auth::User()->update($this->validateRequest());
        $this->storedImage(Auth::User());
        return back()->with('status', 'Your Profile update!!');
  }

  private function validateRequest()
  {
      return request()->validate([
        'name' => 'required | string',
        'phone' => '',
        'status' => '',
        'gender' => 'required | string',
    ]);
  }
  private function storedImage($image)
  {
      if(request()->hasfile('image')){
          $file = request()->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = "/images/profiles/".time().'.'.$extension;
          $file->move(public_path("../public/images/profiles"), $filename);
          $image->image = $filename;
          $image->save();
      }
  }
}
