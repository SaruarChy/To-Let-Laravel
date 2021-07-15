@extends('template')
@section("login")
<div class="login" style="margin-top:120px !important">
    @if(session()->has('login_mg'))


    <p style="text-align:center; padding:10px 0; color:red;">

        <?php if (session()->has('login_mg')) {
            echo session()->get('login_mg');
        }
        session()->pull('login_mg');
        ?>
    </p>

    @endif

    <div class="row flex" style="font-family: Roboto, sans-serif;">
        <div class="register col-sm-12 col-md-6 col-xm-12 mx-auto my-auto">
            <form action="{{url('login')}}" method="POST">
                @csrf

                <div class="input">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="input">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>


                <input type="submit" class="btn btn-primary align-center" value="Login" style="margin-top:5px">
            </form>
        </div>
    </div>
</div>
@endsection