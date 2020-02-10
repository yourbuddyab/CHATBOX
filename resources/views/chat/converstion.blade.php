@foreach ($chat as $key => $item)
@if ($item->nameid !=  Auth::user()->name)
<h6>{{$item->nameid}}</h6>
<h5>{{$item->message}}</h5>
<hr>
@endif
@if ($item->nameid ==  Auth::user()->name)

<h6 class="text-right">{{$item->nameid}}</h6>
<h5 class="text-right">{{$item->message}}</h5>
<hr>


@endif
{{-- {{$item->nameid ==  Auth::user()->name  ? '0':'1'}} --}}
@endforeach
