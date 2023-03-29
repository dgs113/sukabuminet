@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4>Buat Berita Baru</h4>
                    <hr>
                    <form action="{{ url('/dashboard/berita') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul-berita" class="form-control-label">Judul Berita</label>
                            <input class="form-control @error('title') is-invalid @enderror" name="title" type="text"
                                value="{{ old('title') }}" id="judul-berita" autofocus required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Slug</span>
                            <input type="text" class="form-control" id="slug-berita" aria-label="Sizing example input"
                                name="slug" value="{{ old('slug') }}" aria-describedby="inputGroup-sizing-sm" readonly>
                        </div>
                        <div class="row mb-3">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="category-berita">kategori</label>
                                    <select class="form-control" name="category_id" id="category-berita">

                                        @foreach ($category as $c)
                                            @if (old('category_id') == $c->id)
                                                <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                                            @else
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 d-flex align-items-center">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" value="true" name="is_headline"
                                        id="checkHeadline">
                                    <label class="form-check-label" for="checkHeadline">
                                        Jadiakn Headline
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6  col-sm-6 d-flex align-items-center">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" value="true" name="is_archive"
                                        id="checkArsip">
                                    <label class="form-check-label" for="checkArsip">
                                        Jadiakn arsip
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="image" class="form-label">Image Berita</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Caption :</span>
                            <input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption"
                                value="{{ old('caption') }}">
                            @error('caption')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body" class="form-control-label">Isi Berita</label>
                            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                            <trix-editor input="body"></trix-editor>
                            @error('body')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Buat Berita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#judul-berita')
        const slug = document.querySelector('#slug-berita')

        title.addEventListener('change', function() {
            fetch('/dashboard/berita/create-slug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })


        function previewImage() {
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
