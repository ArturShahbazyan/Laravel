@extends('default.layout.layout')


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-6 col-md-offset-3 register_col">

            <h2 class="text-center bg_reg">Create Account</h2>

            <p class="divider-text">
                <hr>
            </p>

            <div class="img">
                <img src="" alt="">
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" class="form-control" id="firstname"
                            placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lstname">Last name</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password">
                </div>

                <div class="form-group col-md-12">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <input type="submit" class="btn btn-primary" name="register" value="Register">

                    <p class="text-center">Have an account? <a href="{{ url('/login') }}">Log In</a> </p>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

@endsection