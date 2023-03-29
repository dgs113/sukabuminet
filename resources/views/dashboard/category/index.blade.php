@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    @if (session()->has('success'))
                        <div class="col-lg-12">

                            <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
                                <strong>berhasil!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="row">

                        <div class="col-lg-9 col-md-12">
                            <h4>List Category</h4>

                        </div>
                        <div class="col-lg-3 col-md-12">
                            <a href="{{ url('dashboard/category/create') }}" class="btn btn-primary">Tambah Category</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategory</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $c)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>
                                            <a href="{{ url('dashboard/category/' . $c->slug . '/edit') }}"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{ url('dashboard/category/' . $c->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Yakin Akan Menghapus?')"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
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
@endsection
