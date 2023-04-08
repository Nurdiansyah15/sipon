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
            <div class="row my-shape card">
                <div class="row content-title d-flex align-items-center">
                    {{-- <a style="width:max-content;color:#114f5a" href="/"><i class="fa-solid fa-left-long"></i></a> --}}
                    {{-- Super Admin --}}
                    <nav class="navbar m-0 navbar-expand-lg navbar-light navbar-content">
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
                                        <a class="nav-link" aria-current="page" href="/">Dashboard <i
                                                class="fa-solid fa-angle-right"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active disabled" href="#">Super Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                @if (session()->has('success'))
                    <div class="col-10 mx-auto alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('failed'))
                    <div class="col-10 mx-auto alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                @endif
                <div class="my-shape card col-12">
                    <div class="title">
                        User Role Manajemen
                        <button data-bs-target="#tambahRole" data-bs-toggle="modal" class="btn btn-circle mx-2"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="row mx-5 mb-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->nis_santri }}</td>
                                        <td>{{ $user->santri->fullname }}</td>
                                        <td>
                                            @if (count($user->roles) > 1)
                                                <div class="dropdown">
                                                    <button style="border: none; padding:5px"
                                                        class="btn-long dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Roles
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        @foreach ($user->roles as $role)
                                                            <li class="dropdown-item d-flex justify-content-between">
                                                                @if ($role->name != 'super_admin' && $role->name != 'santri')
                                                                    {{ $role->name }}
                                                                    <form method="POST"
                                                                        action="/super_admin/roleuser?user_id={{ $user->id }}&&role_id={{ $role->id }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn-circle-off">
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    {{ $role->name }}
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @else
                                                @foreach ($user->roles as $role)
                                                    {{ $role->name }}
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Role -->
    <div class="modal fade" id="tambahRole" tabindex="-1" aria-labelledby="tambahRoleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahRoleLabel">Tambah Role User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/super_admin/roleuser" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">NIS</label>
                            <select name="user_id" class="form-select" aria-label="Default select example">
                                <option value="" selected>Pilih NIS Santri
                                </option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nis_santri }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Roles</label>
                            <select name="role_id" class="form-select" aria-label="Default select example">
                                <option value="" selected>Pilih Role</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-long-off" data-bs-dismiss="modal">Tutup</button>
                        <button type="sumbit" class="btn btn-long">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end of content --}}
@endsection
