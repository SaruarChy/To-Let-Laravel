@extends('template')
@section("detail")
<section class="all_detail">
    <div class="container" style="font-family: Roboto, sans-serif;">
        <a href="{{url('home')}}" style="padding:10px 0px; margin-left:10%;">Go back</a>
        <h3 class="text-center" style="padding:20px 0px;">Advertisement</h3> <hr>
        <div class="row m-auto home_container">

            <div class="col-sm-12 col-md-6">
                <div class="img">
                    <img src="{{url('img/' . $item->image)}}" style="width:300px;" alt="">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <h6 classs="border-bottom">Aviable for&nbsp; : &nbsp;&nbsp; {{$item->category}} </h6>
                <h6 classs="border-bottom">Per mannth&nbsp; : &nbsp;&nbsp; {{$item->price}} tk</h6>
                <h6 classs="border-bottom">Size&nbsp; : &nbsp;&nbsp; {{$item->status}} sqft</h6>
                <h6 classs="border-bottom">Category&nbsp; : &nbsp;&nbsp; {{$item->category}} </h6>
                <h6 classs="border-bottom">Total rooms&nbsp; : &nbsp;&nbsp; {{$item->num_of_room}} </h6>
                <h6 classs="border-bottom">Address&nbsp; : &nbsp;&nbsp; {{$item->address}} </h6>
            </div>
            <div class="col-sm-12">
                <h6>Description : </h6>
                <p>{{$item->detail}}</p>
            </div>

            <div class="contact_author"> <br>
                <h5>Contact the advertiser via</h5>
                <h6> Email : <span style="font-size:20px; color:green;">{{$item->email}}</span></h6>

                <h6> Mobile : <span style="font-size:20px; color:green;">{{$item->mobile}}</span></h6> 
            </div>
        </div>
        <hr>
    </div>
</section>
@endsection