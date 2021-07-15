@extends('template')
@section("home")
<section class="home">
    <div class="row container m-auto home_container">
        @foreach($data as $item)
        <div class="col-sm-12 col-md-4 col-lg-3 align-align-self-start house_detail">
            <div class="img">
                <img src="{{url('img/'. $item->image)}}" alt="" class="img-fluid">
            </div>
            <div class="text text-center">
                <a>{{$item->category}}&nbsp;&nbsp; &#40; {{$item->address}}&#41;</a>

                <a></a>
                <p><a href="{{url('detail/' . $item['id'])}}"> See details</a></p>

            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection