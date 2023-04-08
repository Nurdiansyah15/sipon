@extends('web.template.master')
@section('content')
    {{-- content --}}
    <div class="row content">
        <div class="col-md-3 user-information">
            <div class="card my-shape">
                <div class="photo m-auto mt-5" style="background-image: url({{ asset('/img/me.png') }})">
                    <div class="button-photo m-auto">
                        <button type="button" class="btn btn-circle"><i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                </div>
                <div class="name text-center mt-3">
                    {{ $userlogin['fullname'] }}
                </div>
                <div class="col-9 m-auto">
                    <hr style="height:2px;border-width:0;color:rgb(23, 23, 23);background-color:rgb(33, 33, 33)" />
                </div>
                <div class=" col-9 m-auto mb-2">
                    <div class="identity">
                        <h5 class="card-title">NIS</h5>
                        <p class="card-text"> {{ $userlogin['nis'] }}</p>
                    </div>
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
            <div class="row">
                <div class="row content-title">
                    Dashboard
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
    </div>
    {{-- end of content --}}
@endsection
