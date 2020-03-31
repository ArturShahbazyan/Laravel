@extends('default.layout.layout')


@section('content')
<div class="container">

    <div class="img">
        <img src="" alt="">
    </div>

    <div class="col-md-6 col-md-offset-3 login_col">

        <h2 class="text-center bg_reg">Log In</h2>

        <hr>


        <form method="POST" action="{{route('login')}}">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Login" name="email">
                </div>
                <div class="form-group col-md-12">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">

                    @if($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $message }}</li>
                        </ul>
                    </div>
                    @endif


                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <input type="submit" class="btn btn-primary" name="login" value="Sign in" />
                </div>

            </div>

            <div class="form-row">
                <div class="col-md-8">
                    <p> <a href="{{ url('/register') }}">Register</a> </p>
                </div>
                <div class="col-md-4">
                    <div class="float-left">
                        <p> <a href="#">Forgot password ?</a> </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection