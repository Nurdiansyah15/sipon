@extends('web.template.master-dashboard')
@section('content')
    {{-- content --}}
    <div class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
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
                            <div class="btn item-service text-center">
                                <div class="icon mb-3 mt-4">
                                    <i class="fa-solid fa-file fa-3x"></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>Perizinan</h4>
                                </div>
                            </div>
                            <div class="btn item-service text-center">
                                <div class="icon mb-3 mt-4">
                                    <i class="fa-solid fa-graduation-cap fa-3x"></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>Akademik</h4>
                                </div>
                            </div>
                            <div class="btn item-service text-center">
                                <div class="icon mb-3 mt-4">
                                    <i class="fa-solid fa-shop fa-3x"></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>Angkringan</h4>
                                </div>
                            </div>
                            <div class="btn item-service text-center">
                                <div class="icon mb-3 mt-4">
                                    <i class="fa-solid fa-notes-medical fa-3x"></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>Puskestren</h4>
                                </div>
                            </div>
                            <div class="btn item-service text-center">
                                <div class="icon mb-3 mt-4">
                                    <i class="fa-solid fa-money-bill fa-3x"></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>Keuangan</h4>
                                </div>
                            </div>
                            <div class="btn item-service text-center">
                                <div class="icon mb-3 mt-4">
                                    <i class="fa-solid fa-user-graduate fa-3x"></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>Pendaftaran Santri Baru</h4>
                                </div>
                            </div>
                            <div class="btn item-service text-center">
                                <div class="icon mb-3 mt-4">
                                    <i class="fa-regular fa-file fa-3x"></i>
                                </div>
                                <div class="title-item-service">
                                    <h4>Administrasi</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-shape">
                    <div class="photo m-auto mt-5" style="background-image: url({{ asset('/img/me.png') }})">
                        <div class="button-photo m-auto">
                            <button type="button" class="btn btn-circle"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                    <div class="name text-center mt-3">
                        Nurdiansyah
                    </div>
                    <div class="col-9 m-auto">
                        <hr style="height:2px;border-width:0;color:rgb(23, 23, 23);background-color:rgb(33, 33, 33)" />
                    </div>
                    <div class="card-body col-9 m-auto mb-2">
                        <div class="identity">
                            <h5 class="card-title">NIS</h5>
                            <p class="card-text">1000120001</p>
                        </div>
                        <div class="identity">
                            <h5 class="card-title">Email</h5>
                            <p class="card-text">nurdiansyah15@gmail.com</p>
                        </div>
                        <div class="identity">
                            <h5 class="card-title">No. Telp</h5>
                            <p class="card-text">083113867425</p>
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
        </div>
    </div>
    {{-- end of content --}}
@endsection
