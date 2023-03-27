<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sipon Kyai Galang Sewu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('/css/login2-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row upper" style="background-image: url({{ asset('/img/nature.jpg') }})">
            <div class="col-12 jumbroton">
                <img src="{{ asset('/img/logo-sipon-inverted.png') }}" alt="logo">
            </div>
        </div>
        <div class="row login-box">
            <div class="row">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('failed'))
                    <div class="col-12 alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                @endif
            </div>
            <div class="col-12 login-form">
                <div class="title-login-form">
                    <span> Selamat Datang, </span><br>
                    Santri Ponpes Kyai Galang Sewu
                </div>
                <div class="form-section">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="input-section">
                            <label for="">NIS</label>
                            <input class="" name="nis_santri" value="{{ old('nis_santri') }}" type="text"
                                required>
                        </div>
                        <div class="input-section">
                            <label for="">Password</label>
                            <input class="" name="password" type="password" required>
                        </div>

                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-login" type="submit">Sign in</button>
                        <p class="mt-3 mb-3">&copy; 2023</p>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    {{-- icon kit nurdinurdiansyah15@gmail.com --}}
    <script src="https://kit.fontawesome.com/dd5538ca6a.js" crossorigin="anonymous"></script>
</body>

</html>
