    <!-- Styles -->
    <style>
html,
body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
}

.full-height {
    height: 30vh;
}

.flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
}

.position-ref {
    position: relative;
}

.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
}

.content {
    text-align: center;
}

.title {
    font-size: 60px;
}

text-transform: uppercase;
}

.m-b-md {
    margin-bottom: 30px;
}
    </style>

    @extends('default.layout.layout')

    @section('content')

    <div class="flex-center position-ref full-height">

        <!-- @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif -->

        <div class="content">
            <div class="title m-b-md">
                Welcome Laravel
            </div>
        </div>
    </div>
    @endsection