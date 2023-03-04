        {{-- navbar --}}
        <nav class="navbar">
            <div class="col-md-8">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('/img/logo-sipon.png') }}" alt="Logo" width="200"
                        class="d-inline-block align-text-top">
                </a>
            </div>
            <div class="col-md-4 d-flex flex-row-reverse">
                <div class="logout">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-long m-2"><i
                                class="fa-solid fa-right-from-bracket mx-2"></i>Logout</button>
                    </form>
                </div>
                <div class="notification">
                    <button type="button" class="btn btn-circle m-2"><i class="fa-solid fa-bell"></i></button>
                </div>
            </div>
        </nav>
        {{-- end of navbar --}}
