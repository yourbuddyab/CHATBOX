@extends('layouts.app')
@section('content')

<style>
    /* custom */
    .wrapper {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .wrapper .file-upload {
      height: 200px;
      width: 200px;
      border-radius: 100px;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      border: 4px solid #fff;
      overflow: hidden;
      background-image: linear-gradient(to bottom, #2590eb 50%, #fff 50%);
      background-size: 100% 200%;
      transition: all 1s;
      color: #fff;
      font-size: 100px;
    }
    .file-upload{
    background-position: center center!important;
    background-repeat: no-repeat!important;
    background-size: cover!important;
    height: 200px!important;
    width: 150px!important;
    }
    .wrapper .file-upload input[type='file'] {
      height: 200px;
      width: 200px;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      cursor: pointer;
    }
    
    .wrapper .file-upload:hover {
    
      color: #2590eb;
    }
    
    </style>
<section class="jnr__call__to__action call__to__action--2 bg-image--7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <div class="jnr__call__action__wrap d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between align-items-center">
                    <div class="callto__action__inner">
                        <h2>Create Own Poll</h2>
                        @if (!empty(session('url')))
                          <label for="" class="h6 text-white">Copy Link And Send your Friends :-</label>
                          <label for="" class="h6 text-white bg-info">{{session('url')}}</label>
                          <a href="{{session('url')}}">Click For see Your Poll</a>
                            
                        @endif
                       <form action="/poll" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                              <label for="question" class="text-white">Enter Your Question</label>
                              <input type="text" name="question" id="question" class="form-control" placeholder="Enter Your Question">
                              <small class="text-white">Min 2 pics allow</small> 
                            </div>
                            <label for="question" class="text-white"></label>
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <div class="wrapper">
                                    <div class="file-upload pic1" id="#preiv1" style="background-image:url('')">
                                    <input type="file" name="image1" id="profile1">
                                    <i class="fa fa-plus icon1" aria-hidden="true"></i>
                                    </div>
                                    <img src="" alt="">
                              </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="wrapper">
                                    <div class="file-upload pic2" id="#preiv2" style="background-image:url('')">
                                    <input type="file" name="image2" id="profile2">
                                    <i class="fa fa-plus icon2" aria-hidden="true"></i>
                                    </div>
                                    <img src="" alt="">
                              </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="wrapper">
                                    <div class="file-upload pic3" id="#preiv3" style="background-image:url('')">
                                    <input type="file" name="image3" id="profile3">
                                    <i class="fa fa-plus icon3" aria-hidden="true"></i>
                                    </div>
                                    <img src="" alt="">
                              </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="wrapper">
                                    <div class="file-upload pic4" id="#preiv4" style="background-image:url('')">
                                    <input type="file" name="image4" id="profile4">
                                    <i class="fa fa-plus icon4" aria-hidden="true"></i>
                                    </div>
                                    <img src="" alt="">
                              </div>
                                </div>
                            </div>
                    </div>
                <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <div class="callto__action__btn text-center mx-auto mt-3">
                        <button type="submit" class="dcare__btn btn__org hover--theme">Create A New Poll</button>
                    </div>
                </form>              
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
   $(document).ready(function() {
    $('#profile1').change(function(e) {
      var url = URL.createObjectURL(e.target.files[0]);
      var z = 'background-image:url(' + url + ')';
      $('.pic1').attr('style', z);
      $('.icon1').css('display', 'none');
    });
  });
  $(document).ready(function() {
    $('#profile2').change(function(e) {
      var url = URL.createObjectURL(e.target.files[0]);
      var z = 'background-image:url(' + url + ')';
      $('.pic2').attr('style', z);
      $('.icon2').css('display', 'none');
    });

  });   
  $(document).ready(function() {
    $('#profile3').change(function(e) {
      var url = URL.createObjectURL(e.target.files[0]);
      var z = 'background-image:url(' + url + ')';
      $('.pic3').attr('style', z);
      $('.icon3').css('display', 'none');
    });

  });   
  $(document).ready(function() {
    $('#profile4').change(function(e) {
      var url = URL.createObjectURL(e.target.files[0]);
      var z = 'background-image:url(' + url + ')';
      $('.pic4').attr('style', z);
      $('.icon4').css('display', 'none');
    });

  });
</script>
@endsection
