@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVideoModal">
                Tambah Video
            </button>

        </div>
        <div class="col-lg-6 col-md-12">
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
    <div class="row mt-3">
        @foreach ($videos as $v)
            <div class="col-lg-3 mt-3">
                <div class="card p-4">
                    <iframe class="col-lg-12" style="min-height: 250px" src="{{ $v->uri }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <div class="col-lg-12 d-flex flex-column align-items-center mt-3">

                        <h5 class="">{{ $v->title }}</h5>
                        <p class="text-sm text-center">{{ $v->excerpt }}</p>
                        <form action="{{ url('dashboard/video/' . $v->slug) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus Video?')"><i
                                    class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex flex-column px-4">

            {{ $videos->links() }}
        </div>
        {{-- @for ($i = 0; $i < 10; $i++)
            <div class="col-lg-3 mt-3">
                <div class="card p-4">
                    <iframe class="col-lg-12" style="min-height: 250px" src="https://youtu.be/tAb0Go5Ct-0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <div class="col-lg-12 d-flex flex-column align-items-center mt-3">

                        <h5 class="">Ini ADalah Judul</h5>
                        <p class="text-sm text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio
                            minus
                            repellendus quibusdam officia fugiat cupiditate!...</p>
                    </div>
                </div>
            </div>
        @endfor --}}

    </div>

    <div class="modal fade" id="addVideoModal" tabindex="-1" aria-labelledby="addVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVideoModalLabel">Tambah Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('dashboard/video') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="linkEmbededYt" class="form-label">Link Embeded Youtube Video</label>
                            <input type="text" name="uri" class="form-control" id="linkEmbededYt"
                                placeholder="Masukan Link Embed Video Youtube" value="{{ old('uri') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul-video" class="form-label">Judul Video</label>
                            <input type="text" name="title" class="form-control" id="judul-video"
                                placeholder="Masukan Link Embed Video Youtube" value="{{ old('title') }}" required>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Slug</span>
                            <input type="text" class="form-control" id="slug-video" aria-label="Sizing example input"
                                name="slug" value="{{ old('slug') }}" aria-describedby="inputGroup-sizing-sm" readonly>
                        </div>
                        <div class="form-group">
                            <label for="body" class="form-control-label">Isi Berita</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                            <trix-editor input="body"></trix-editor>
                            @error('body')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#judul-video')
        const slug = document.querySelector('#slug-video')

        title.addEventListener('change', function() {
            fetch('/dashboard/berita/create-slug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })
    </script>
@endsection
