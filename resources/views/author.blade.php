@extends('template')
@section("author")
<?php

use App\Http\Controllers\UserData;

$auth_data = UserData::authordata();
?>
<section class="author_account">
    <div class="row container auth_data" style="font-family: Roboto, sans-serif;">
        <div class="col-sm-12 col-md-6 col-offset-3" style="font-family: Roboto, sans-serif;">
            <h6>Advertiser : {{$auth_data['name']}}</h6>
            <h6>Email : {{$auth_data['email']}}</h6>
            <h6>Mobile : {{$auth_data['mobile']}}</h6>
        </div>

    </div>

    <form action="{{ url('post') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="container" style="font-family: Roboto, sans-serif;">

            <div class="post_here">
                <h3 style="text-align:center; padding:10px 0px; margin-bottom:80px;">Create your Ad</h3> <hr>

                @if($errors->any())
                @foreach($errors->all() as $err)

                <li style="list-style-type:none;color:red; padding:5px 0px; margin-left:10%">{{$err}}</li>
                @endforeach
                @endif


                <div class="input_div" style="margin:25px 0px;" style="margin:25px 0px;">
                    Address : <input type="text" name="address">
                </div>

                <div class="input_div" style="margin:25px 0px;">
                    Number of Room : <input type="text" name="num_of_room">
                </div>
                <div class="input_div" style="margin:25px 0px;">
                    Size : 
                    <input type="text" name="status"> <p style = "display:inline; font-size:24px">sqft</p>
                </div>
                <div class="input_div" style="margin:25px 0px;">
                    <label for="category">Category : </label>
                    <select name = "category">
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>			
                    </select>
                </div>
                

                <div class="input_div" style="margin:25px 0px;">
                    Rent per month : <input type="text" name="price"> <p style = "display:inline; font-size:24px">bdtk</p>
                </div>
                <div class="input_div" style="margin:25px 0px;">
                    Description : <br><input type="textarea" name="detail" style="width:350px; height:100px;">
                </div>
                <div class="input_div" style="margin:25px 0px;" style="margin:25px 0px;">
                    Image: <input type="file" value="Image" name="image">
                </div>
                <div class="input_div" style="margin:25px 0px;" style="margin:25px 0px;">
                    <input type="submit" value="Post Now">
                </div>
                <hr>
            </div>
        </div>

    </form>
    <div class="list_of_list" style="margin:80px 0px; font-family: Roboto, sans-serif;">
        <h3 style="text-align:center; padding:10px 0px; margin-bottom:80px;">Your post</h3>
        @foreach($items as $item)
        <div style="width:80%; margin:0 auto">

            <div class="row auth_list" style="margin-bottom:50px;">
                <div class="col-sm-12 col-md-6 list_img">

                    <img src="{{url('img/' . $item->image)}}" alt="" class="image-fluid">
                </div>
                <div class="col-sm-12 col-md-6 col-offset-2">
                    <h6 classs="border-bottom">Aviable for&nbsp; : &nbsp;&nbsp; {{$item->category}} </h6>
                    <h6 classs="border-bottom">Per month&nbsp; : &nbsp;&nbsp; {{$item->price}} tk</h6>
                    <h6 classs="border-bottom">Size&nbsp; : &nbsp;&nbsp; {{$item->status}} sqft</h6>
                    <h6 classs="border-bottom">Total rooms&nbsp; : &nbsp;&nbsp; {{$item->num_of_room}} </h6>
                    <h6 classs="border-bottom">Address&nbsp; : &nbsp;&nbsp; {{$item->address}} </h6>
                    <h6 classs="border-bottom">Description :</h6>
                    <p>{{$item->detail}}</p>

                    <a href="{{url('remove/' . $item->id)}}" style="padding:4px 7px ;border-radius:5px ;margin:8px 5px 2px 10px;background:red;color:white ">Remove Ad</a>
                    <a href="{{url('edit/' . $item->id)}}" style="padding:4px 7px ;border-radius:5px ;margin:8px 5px 2px 10px;background:green;color:white ">Edit Ad</a>

                </div>

            </div>
        </div>
        @endforeach

    </div>
</section>
@endsection