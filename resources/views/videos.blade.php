@extends('layout/main')

@section('container')
    <section id="" class=" mt-5">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3>Videos</h3>
                    <div class="row">

                        @foreach ($videos as $v)
                            <div class="col-lg-4 mt-3">
                                <div class="card p-4">
                                    <iframe class="col-lg-12" style="min-height: 250px" src="{{ $v->uri }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                    <div class="col-lg-12 d-flex flex-column align-items-center mt-3">

                                        <h5 class="">{{ $v->title }}</h5>
                                        <p class="text-sm text-center">{{ $v->excerpt }}</p>
                                        <a href="{{ url('video/' . $v->slug) }}" class="btn btn-outline-primary">Lihat
                                            selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex flex-column px-4">

                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
