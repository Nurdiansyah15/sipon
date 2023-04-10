@extends('web.template.master')
@section('content')
    {{-- content --}}
    <div class="row content">
        <div class="col-md-3 user-information">
            <div class="box-short-profile card my-shape" id="shape">
                <div class="short-profile" id="short-profile">
                    <div class="photo" style="background-image: url({{ asset('/img/user.png') }})">
                        <div class="button-photo m-auto">
                            <button type="button" class="btn btn-circle"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                    <div class="item-short-profile">
                        <div class="name">
                            {{ $userlogin['fullname'] }}
                        </div>
                        <div class="nis">
                            {{ $userlogin['nis'] }}
                        </div>
                    </div>
                </div>
                <div class="col-9 mx-auto line" id="line">
                    <hr style="height:2px;border-width:0;color:rgb(23, 23, 23);background-color:rgb(33, 33, 33)" />
                </div>
                <div class="profile-item col-9 mx-auto mb-2" id="profile-item">
                    <div class="identity">
                        <h5 class="card-title">Email</h5>
                        <p class="card-text"> {{ $userlogin['email'] }}</p>
                    </div>
                    <div class="identity">
                        <h5 class="card-title">No. Telp</h5>
                        <p class="card-text"> {{ $userlogin['phone'] }}</p>
                    </div>
                    <div class="identity">
                        <h5 class="card-title">Status</h5>
                        <div class="status-card">
                            <p>Santri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 dashboard-content">
            <div class="row content-title d-flex align-items-center" id="content-title">
                {{-- <a style="width:max-content;color:#114f5a" href="/"><i class="fa-solid fa-left-long"></i></a> --}}
                {{-- Super Admin --}}
                <nav class="navbar m-0 navbar-expand navbar-light navbar-content">
                    <div class="container-fluid">
                        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button> --}}
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active disabled" aria-current="page" href="/">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="announ my-shape col-md-12">
                <div class="title-service">
                    <h2 style="color:white">Pengumuman</h2>
                </div>
                {{-- content pengumuman --}}
            </div>
            <div class="service my-shape col-md-12">
                <div class="title-service">
                    <h2>Layanan</h2>
                </div>
                <div class="group-service row mx-5 my-5">
                    <!--<a class="btn item-service text-center" href="/super_admin">-->
                    <!--    <div class="icon mb-3 mt-4">-->
                    <!--        <i class="fa-solid fa-user-plus fa-3x"></i>-->
                    <!--    </div>-->
                    <!--    <div class="title-item-service">-->
                    <!--        <h4>Super Admin</h4>-->
                    <!--    </div>-->
                    <!--</a>-->
                    <!--<a class="btn item-service text-center" target="_blank"-->
                    <!--    href="https://psb.kyaigalangsewu.net/admin?data={{ $data }}">-->
                    <!--    <div class="icon mb-3 mt-4">-->
                    <!--        <i class="fa-solid fa-user-graduate fa-3x"></i>-->
                    <!--    </div>-->
                    <!--    <div class="title-item-service">-->
                    <!--        <h4>Penerimaan Santri Baru</h4>-->
                    <!--    </div>-->
                    <!--</a>-->

                    @foreach ($menu as $item)
                        @if ($item->url === '/super_admin')
                            <a class="btn item-service text-center" href="{{ $item->url }}">
                                <div class="icon mb-3 mt-4">
                                    <i class="{{ $item->icon }} fa-3x"></i></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>{{ $item->menu_name }}</h4>
                                </div>
                            </a>
                        @else
                            {{-- https://santri.kyaigalangsewu.net --}}
                            <a class="btn item-service text-center" target="_blank"
                                href="{{ $item->url }}?data={{ $data }}">
                                <div class="icon mb-3 mt-4">
                                    <i class="{{ $item->icon }} fa-3x"></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>{{ $item->menu_name }}</h4>
                                </div>
                            </a>
                        @endif
                    @endforeach

                    <a class="btn item-service text-center" target="_blank"
                        href="http://127.0.0.1:8200/?data={{ $data }}">
                        <div class="icon mb-3 mt-4">
                            <i class="fa-solid fa-globe fa-3x"></i><i class="fa-solid fa-laptop-binary"></i>
                        </div>
                        <div class="title-item-service">
                            <h4>Server Local</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- end of content --}}
@endsection
