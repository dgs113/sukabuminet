@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4>Kategori</h4>
                    <hr>
                    <form action="{{ url('dashboard/category/' . $category->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name-category" class="form-label">Kategori Baru</label>
                            <input type="text" class="form-control" name="name" id="name-category"
                                placeholder="Masukan Kategori Baru" value="{{ old('name', $category->name) }}" required>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Slug</span>
                            <input type="text" class="form-control" id="slug-category" aria-label="Sizing example input"
                                name="slug" value="{{ old('slug', $category->slug) }}"
                                aria-describedby="inputGroup-sizing-sm" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Kategori</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#name-category')
        const slug = document.querySelector('#slug-category')

        title.addEventListener('change', function() {
            fetch('/dashboard/category/create-slug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
    </script>
@endsection
