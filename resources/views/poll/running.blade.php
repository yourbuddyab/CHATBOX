@extends('layouts.app')
@section('content')
<section class="dcare__counterup__area p-5 bg-image--6">
    <div class="container py-5">
        <div class="row">
            @foreach ($result as $item)
            <div class="mx-auto h3 col-md-12 col-12 mb-1 text-center">
                <hr class="m-3" style="background-size: 4px 4px;
                border: 10!important;
                background-color: aqua;
                height: 1px;
                margin: 0 0 2">
                {{$item->question}}<br>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="counterup__wrapper d-flex flex-wrap flex-lg-nowrap flex-md-nowrap justify-content-between">
                    
                    <div class="funfact" >
                        <div class="fact__icon">
                            <img src="{{$item->image1}}" alt="flat icon">
                        </div>
                        <div class="fact__count ">
                            <span class="count">{{$item->vote->image1}}</span>
                        </div>
                    </div>
                    <div class="funfact">
                        <div class="fact__icon">
                            <img src="{{$item->image2}}" alt="flat icon">
                        </div>
                        <div class="fact__count ">
                            <span class="count">{{$item->vote->image2}}</span>
                        </div>
                    </div>
                    @if (!empty($item->image3))
                    <div class="funfact">
                        <div class="fact__icon">
                            <img src="{{$item->image3}}" alt="flat icon">
                        </div>
                        <div class="fact__count ">
                            <span class="count">{{$item->vote->image3}}</span>
                        </div>
                    </div>
                     @endif
                    @if (!empty($item->image4))
                    <div class="funfact">
                        <div class="fact__icon">
                            <img src="{{$item->image4}}" alt="flat icon">
                        </div>
                        <div class="fact__count ">
                            <span class="count">{{$item->vote->image4}}</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="mx-auto h6 mt-5 text-center">
                Poll Create by : {{$item->name}}<br>
                Total Casted : {{$item->vote->total}}
                @if ($item->vote->status == 1 )
                   <div class="text-succes">Open</div> 
                @else
                   <div class="text-danger">Closed</div> 
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection