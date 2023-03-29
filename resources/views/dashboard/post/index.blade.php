@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <h4 class="px-5 py-3">Indeks Berita</h4>
                      </div>
                      <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center">
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
                      </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-12 d-flex justify-content-center">
                        <a href="{{ url('dashboard/berita/create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Buat Berita</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 text-center">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Judul</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Keterangan</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Kategori</th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $p)
                                <tr>
                                    <td class="text-xs">{{ $loop->iteration }}</td>
                                    <td class="text-sm font-weight-bold mb-0">{{ $p->title }}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{ ($p->is_archive == true) ? '[Arsip]' : '[Publish]' }}{{ ($p->is_headline == true) ? ' | [Headlines]' : '' }}</td>
                                    <td class="text-xs font-weight-bold mb-0">{{ $p->category->name }}</td>
                                    <td>
                                        <a target="_blank" href="{{ url('berita/' . $p->slug) }}"
                                            class="btn btn-icon btn-primary" style="padding : 10px; border-radius: 5px;">
                                            <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                                        </a>
                                        <a href="{{ url('/dashboard/berita/' . $p->slug . '/edit') }}"
                                            class="btn btn-icon btn-warning" type="button"
                                            style="padding : 10px; border-radius: 5px;">
                                            <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                        </a>
                                        <form action="{{ url('dashboard/berita/' . $p->slug) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-icon btn-danger" type="submit"
                                              style="padding : 10px; border-radius: 5px;" onclick="return confirm('Yakin Mau Hapus Berita?')">
                                              <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                          </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex flex-column px-4">

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
