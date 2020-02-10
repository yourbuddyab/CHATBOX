@extends('layouts.app')

@section('content')
<div class="container">            
                    <div class="container">
                        <div class="col-md-10 py-4 mx-auto">
                            <div class="card">
                                <div class="card-header text-center">Arjun Mudit Gopi</div>
                                <div class="card-body border">
                                    <div id="status" style="height:50vh; overflow-y:scroll">
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
    
                                    </div>
                                </div>
                                <div>
                                    <form action="/home" class="row p-3" method="post">
                                        @csrf
                                        <div class="col-md-11 form-group">
                                          <input type="hidden" name="nameid" value="{{ Auth::user()->name }} ">
                                          <textarea name="message" class="form-control" id="chatmsg" cols="30" rows="2" placeholder="Enter Your Message"></textarea>
                                        </div>
                                        <div class="col-md-1 form-group">
                                          <input id="btn1" type="submit" class="btn btn-info form-control text-center fas fa-paper-plane" style="margin-left: -13px;width: 57px;height: 60px;font-size: 30px" value=">">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div></div></div></div>
                  
@endsection
@section('js')
<script>
   $('#status').scrollTop($('#status')[0].scrollHeight);
   $("form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
        type: "POST", 
        url: url,
        data: form.serialize(),
        success: function(data) {
            $('#chatmsg').val('');
        // $('html').html(data);
        }
        });
    });
        
        $(document).ready(function () {     
        setInterval(function(){
            $('#status').scrollTop($('#status')[0].scrollHeight);
        $('#status').load('converstion');
        }, 1000);  
        }); 
   
</script>
@endsection
