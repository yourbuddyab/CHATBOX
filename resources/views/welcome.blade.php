@extends('layouts.app')
@section('content')
<style>
    /* HIDE RADIO */
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* onclick="form.submit()" STYLES */
[type=radio]:checked + img {
  outline: 2px solid #f00;
}
</style>
<section class="jnr__call__to__action call__to__action--2 bg-image--7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="jnr__call__action__wrap d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between align-items-center">
                    <div class="callto__action__inner">
                        <h2>Poll Voting</h2>
                        <p>Vote and Fun with Family and Friend...........</p>
                    </div>
                    <div class="callto__action__btn">
                        <a class="dcare__btn btn__org hover--theme" href="/poll/create">Create A New Poll</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (!empty($poll))
<section class="junior__gallery__area gallery--2 bg--white p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="section__title text-center">
                    <h2 class="title__line">Poll For MGSU</h2>
                    <p>Voting And Win your Favorite Person.........</p>
                </div>
            </div>
        </div>
        <div class="row galler__wrap mt--40">
            <div class="col-md-12 mb-0">
                <div class="">
                    <h2 class="title__line">{{$poll->question}}</h2>
                    {{-- <p>Voting And Win your Favorite Person.........</p> --}}
                </div>
                <form action="/vote/{{$poll->id}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="question_id" value="{{$poll->id}}">
                    <input type="hidden" name="named" value="{{$poll->name}}">
        </div>
            <!-- Start Single Gallery -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="gallery">
                    <div class="gallery__thumb">
                        <label>
                            <input type="radio" name="vote1" value="{{$poll->image1}}" onclick="form.submit()">
                            <img src="{{$poll->image1}}" alt="poll" class="w-100">
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="gallery">
                    <div class="gallery__thumb">
                        <label>
                            <input type="radio" name="vote2" value="{{$poll->image2}}" onclick="form.submit()">
                            <img src="{{$poll->image2}}" alt="poll" class="w-100">
                        </label>
                    </div>
                </div>
            </div>
            @if (!empty($poll->image3))
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="gallery">
                    <div class="gallery__thumb">
                        <label>
                            <input type="radio" name="vote3" value="{{$poll->image3}}" onclick="form.submit()">
                            <img src="{{$poll->image3}}" alt="poll" class="w-100">
                        </label>
                    </div>
                </div>
            </div> 
            @endif 
            @if (!empty($poll->image4))
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="gallery">
                    <div class="gallery__thumb">
                        <label>
                            <input type="radio" name="vote4" value="{{$poll->image4}}" onclick="form.submit()">
                            <img src="{{$poll->image4}}" alt="poll" class="w-100">
                        </label>
                    </div>
                </div>
            </div>                       <!-- End Single Gallery -->
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-right">
            <small class="">{{$poll->name}}</small>
            </div>
        </div>
    </form>
    </div>
</section>

@endif
@endsection