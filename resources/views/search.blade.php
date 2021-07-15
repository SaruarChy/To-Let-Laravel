@extends('template')
@section("search")
<section class="home" style="margin-top:100px; font-family: Roboto, sans-serif;">
    <div class="container">

        <h3 class="" style="padding:20px 0px;">Search results :</h3>
        @if($data->isEmpty())
        <h4 style="margin:100px 0px 20px 0px; text-align:center; color:red;" ; text-align:center;color:red;>Nothing Found!</h4>
        <p style="margin:100px 0px; text-align:center; color:red;">Click here to return home <a href="{{url('home')}}" style="
            margin:0px 8px;padding:5px 8px ;background:green;color:white;
            border-radius:5px;
        
        
        " ; text-align:center;color:red;>Click</a>
        </p>
        @else
        <div class="row container m-auto home_container">
            @foreach($data as $item)
            <div class="col-sm-12 col-md-4 col-lg-3 align-align-self-start house_detail">
                <div class="img">
                    <img src="{{url('img/'. $item->image)}}" alt="" class="img-fluid">
                </div>
                <div class="text text-center">
                    <a>{{$item->home_type}}&nbsp;&nbsp; &#40; {{$item->address}}&#41;</a>

                    <a></a>
                    <p><a href="{{url('detail/' . $item['id'])}}"> View post</a></p>

                </div>
            </div>
            @endforeach
        </div>
        @endif
</section>
</div>
@endsection