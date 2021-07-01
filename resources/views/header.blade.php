<section class="header">
    <div class="row">
        <div class="col-sm-4 logo">
            <a href="{{url('home')}}">To-Let</a>
        </div>
        <div class="col-md-4 col-sm-12 menu">
            <a href="{{url('home')}}">Home</a>
            <a href="{{url('category')}}">Category</a>
            <a href="{{url('about_us')}}">About Us</a>
            
        </div>
        <div class="col-sm-12 col-md-2">
            
            
            @if(session()->has('user'))
            <a href="{{url('author')}}" style="font-size:20px; color:darkorange;">{{session()->get('user')['name']}}</a>
            <a href="logout">logout</a>
            @else
            <a href="login">login</a>
            <a href="register">sign up</a>
            @endif

        </div>
        <div class="search_box">
            <div class="search">

                <form action="search" style="font-family: Roboto, sans-serif;">
                    <input type="text" name="search" style="width:80% ;height:30px; margin-left:10% ;display:inline-block;font-family: Roboto, sans-serif;">
                    <input type="submit" value="Search" class="btn btn-primary" style="color:black !important;display:inline-block;">
                </form>

            </div>
        </div>

</section>