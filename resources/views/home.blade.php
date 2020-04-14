@extends('layouts.side')
@section('admin')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="/blog" method="post">
          @csrf
          <div class="form-group border">
            <textarea type="text" name="blog" id="search" rows="5" class="form-control" style="border:none!important" placeholder="Write Something here..." aria-describedby="helpId"></textarea>
            <input type="hidden" name="name" value="{{Auth::user()->id}}">
             <button type="submit" class="btn form-control btn-info">Post</button> 
            </div>
        </form>
        <div class="no-underline transition block border border-lighter w-full mb-10 p-4 rounded post-card text-dark" href="">
          <div class="flex flex-col justify-between flex-1">
            <div>
              <p class="leading-normal mb-6 font-serif leading-loose">
              Due to a trademark dispute regarding the name "Airlock", we have renamed Laravel Airlock to Laravel Sanctum (https://github.co m/laravel/sanctum) and have tagged its initial release.You may install Sanctum using composer require laravel/sanctum. All APIs and configuration options remain the same; however, all references to...
              </p>
            </div>
          <div class="flex items-center text-sm text-light">
          <img src="{{Auth::User()->image}}" class="w-10 h-10 rounded-full" title="Taylor Otwell">
          <span class="ml-2 text-dark">Taylor Otwell</span>
          <span class="ml-auto text-dark">Mar, 20 2020</span>
        </div>
      </div>
      </div>
    </div>
</div>
    </div>
  </div>
@endsection
@section('js')

@endsection
