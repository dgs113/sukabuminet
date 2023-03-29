@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Profil User</h4>
                    <form action="{{ url('dashboard/user/' . $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label" for="name">Nama User</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="username">username</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('name', $user->username) }}">
                            </div>
                        </div>

                        <button class="btn btn-primary">Update User</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
