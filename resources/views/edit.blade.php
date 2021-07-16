@extends('template')
@section("author")
<?php

use App\Http\Controllers\UserData;

$auth_data = UserData::authordata();
?>
<section class="author_account">

    <form action="{{ url('update') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="container" style="font-family: Roboto, sans-serif;">

            <div class="post_here">
                <h3 style="text-align:center; padding:10px 0px; margin-bottom:80px;">Edit post</h3>

                @if($errors->any())
                @foreach($errors->all() as $err)

                <li style="list-style-type:none;color:red; padding:5px 0px; margin-left:10%">{{$err}}</li>
                @endforeach
                @endif


                <div class="input_div" style="margin:25px 0px;" style="margin:25px 0px; ">
                    Address:<input type="text" name="address" value="{{$data->address}}">

                </div>
                <div class="input_div" style="margin:25px 0px;">
                    Number of Rooms : <input type="text" name="num_of_room" value="{{$data->num_of_room}}">
                </div>
                <div class="input_div" style="margin:25px 0px;">
                    Size : <input type="text" name="status" value="{{$data->status}}">
                    <p style = "display:inline; font-size:24px">sqft</p>
                </div>
                <div class="input_div" style="margin:25px 0px;">
                    <label for="category">Category : </label>
                    <select name = "category" value="{{$data->home_type}}">
                        <option value="Residential">Residential</option>
                        <option value="Commercial">Commercial</option>			
                    </select>
                </div>
                
                <div class="input_div" style="margin:25px 0px;">
                    Per month rent : <input type="text" name="price" " value="{{$data->price}}">
                    <p style = "display:inline; font-size:24px">bdtk</p>
                </div>
                <div class="input_div" style="margin:25px 0px;">
                    Description : <br><input type="textarea" name="detail" style="width:350px; height:100px;" value="{{$data->detail}}">
                </div>
                <div class="input_div" style="margin:25px 0px;" style="margin:25px 0px;">
                    Image: <input type="file" value="Image" name="image">
                </div>
                <div class="input_div" style="margin:25px 0px;" style="margin:25px 0px;">
                    <input type="hidden" name="allid" value="{{$data->id}}">
                    <input type="submit" value="update">
                </div>
            </div>
        </div>

    </form>

</section>
@endsection