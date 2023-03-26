@extends('web.template.master-login')
@section('content')
    {{-- content --}}
    <div class="row content">
        <div class="col-md-6 m-auto login-card my-shape">
            <div class="row justify-content-center">

                <div class="col-md-6 login-photo" style="background-image: url({{ asset('/img/abah.jpg') }})">

                </div>
                <div class="col-md-6">
                    <div class="login-form">
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('failed'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('failed') }}
                            </div>
                        @endif
                        <div class="logo mb-3">
                            <img src="{{ asset('/img/logo-sipon-inverted.png') }}" alt="">
                        </div>
                        <form action="/login" method="POST">
                            @csrf
                            <h3 class="title"> Sign In</h3>

                            <div class="input-box">
                                <label for="">NIS</label>
                                <input class="" name="username" value="{{ old('username') }}" type="text" required>
                            </div>
                            <div class="input-box">
                                <label for="">Password</label>
                                <input class="" name="password" type="password" required>
                            </div>

                            <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            </div>
                            <button class="btn btn-long" type="submit">Sign in</button>
                            <p class="mt-5 mb-3">&copy; 2023</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of content --}}
@endsection
