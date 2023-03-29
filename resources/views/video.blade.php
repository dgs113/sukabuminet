@extends('layout/main')

@section('container')
    <section class="single-post-content mt-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta">

                            <span class="mx-1">&bullet;</span>
                            <span>{{ $video->created_at->diffForHumans() }}</span>
                        </div>
                        <h1 class="mb-5">{{ $video->title }}</h1>

                        <iframe class="mb-5" style="min-height: 480px; min-width:720px" src="{{ $video->uri }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        {!! $video->body !!}


                    </div><!-- End Single Post Content -->


                    <div class="col-lg-12 mt-5">
                        <div class="row g-5">
                            <div class="section-header d-flex justify-content-between align-items-center">
                                <h2>Indeks Berita</h2>
                                <div><a href="{{ url('berita') }}" class="more">Lihat Semua</a></div>
                            </div>
                            <div class="col-lg-6 border-start custom-border">
                                @foreach ($terbaru->slice(3, 3) as $p)
                                    <div class="post-entry-1">
                                        <a href="{{ url('berita/' . $p->slug) }}"><img
                                                src="{{ asset('storage/' . $p->image) }}" alt=""
                                                class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{ $p->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $p->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2><a href="{{ url('berita/' . $p->slug) }}">{{ $p->title }}</a></h2>
                                        <p class="mb-4 d-block">{{ Str::limit($p->excerpt, 100) }}</p>
                                    </div>
                                @endforeach

                            </div>
                            <div class="col-lg-6 border-start custom-border">
                                @foreach ($terbaru->slice(6, 3) as $p)
                                    <div class="post-entry-1">
                                        <a href="{{ url('berita/' . $p->slug) }}"><img
                                                src="{{ asset('storage/' . $p->image) }}" alt=""
                                                class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{ $p->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $p->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2><a href="{{ url('berita/' . $p->slug) }}">{{ $p->title }}</a></h2>
                                        <p class="mb-4 d-block">{{ Str::limit($p->excerpt, 100) }}</p>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-popular" type="button" role="tab"
                                    aria-controls="pills-popular" aria-selected="true">Populer</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-trending" type="button" role="tab"
                                    aria-controls="pills-trending" aria-selected="false">Trending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-latest" type="button" role="tab"
                                    aria-controls="pills-latest" aria-selected="false">Terbaru</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Popular -->
                            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                                aria-labelledby="pills-popular-tab">
                                @foreach ($popular->slice(0, 5) as $p)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $p->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $p->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="{{ url("berita/$p->slug") }}">{{ $p->title }}</a>
                                        </h2>
                                        <span class="author mb-3 d-block">{{ Str::limit($p->excerpt, 100) }}</span>
                                    </div>
                                @endforeach
                            </div> <!-- End Popular -->

                            <!-- Trending -->
                            <div class="tab-pane fade" id="pills-trending" role="tabpanel"
                                aria-labelledby="pills-trending-tab">
                                @foreach ($trending->slice(0, 5) as $t)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $t->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $t->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="{{ url("berita/$t->slug") }}">{{ $t->title }}</a>
                                        </h2>
                                        <span class="author mb-3 d-block">{{ Str::limit($t->excerpt, 100) }}</span>
                                    </div>
                                @endforeach


                            </div> <!-- End Trending -->

                            <!-- Latest -->
                            <div class="tab-pane fade" id="pills-latest" role="tabpanel"
                                aria-labelledby="pills-latest-tab">
                                @foreach ($terbaru->slice(0, 5) as $t)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $t->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $t->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2 class="mb-2"><a
                                                href="{{ url("berita/$t->slug") }}">{{ $t->title }}</a></h2>
                                        <span class="author mb-3 d-block">{{ Str::limit($t->excerpt, 100) }}</span>
                                    </div>
                                @endforeach



                            </div> <!-- End Latest -->

                        </div>
                    </div>



                    <div class="aside-block">
                        <h3 class="aside-title">Categories</h3>
                        <ul class="aside-links list-unstyled">
                            @foreach ($category as $c)
                                <li><a href="{{ url('category/' . $c->slug) }}"><i class="bi bi-chevron-right"></i>
                                        {{ $c->name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- End Categories -->

                </div>
            </div>
        </div>
    </section>
@endsection
