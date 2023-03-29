@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Profil User</h4>
                    <hr>
                    <ul class="list-group mb-5">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama
                                User:</strong> {{ $user->name }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Username:</strong>
                            {{ $user->username }}</li>

                    </ul>

                    <a href="{{ url('dashboard/user/' . $user->id . '/edit') }}" class="btn btn-warning"><i
                            class="fas fa-edit"></i> Edit User</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalGantiPassword">
                        Ganti Password
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalGantiPassword" tabindex="-1" aria-labelledby="modalGantiPasswordLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalGantiPasswordLabel">ganti Password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/dashboard/user/{{ $user->id }}/updatepass" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label class="form-control-label" for="password">Masukan password baru</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
                    <strong>berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
@endsection
