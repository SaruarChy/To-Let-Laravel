@extends('template')
@section("register")
<div class="llggoo" style="margin-top:120px !important">


    @if(session()->has('mg'))
    <p style="text-align:center; padding:20px 0; color:red;">
        <?php if (session()->has('mg')) {
            echo session()->get('mg');
        }
        session()->pull('mg');
        ?>

    </p>

    @endif
    <div class="row flex" style="font-family: Roboto, sans-serif;">

        <div class="register col-sm-12 col-md-6 col-xm-12 mx-auto my-auto">
            <form action="{{url('register')}}" method="POST">
                @csrf
                <div class="input">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input">
                    <label for="mobile">Mobile:</label>
                    <input type="text" id="mobile" name="mobile" required>
                </div>
                <div class="input">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <input type="submit" class="btn btn-primary align-center" value="sign up" style="margin-top:5px">
            </form>
        </div>
    </div>
</div>
@endsection