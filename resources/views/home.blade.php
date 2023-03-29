@extends('layout.main')

@section('container')
    <main id="main">
        <section id="hero-slider" class="hero-slider">

            <div class="container-md" data-aos="fade-in">
                <div class="section-header d-flex justify-content-between align-items-center mb-3 mt-1">
                    <h2>Hot News</h2>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="col-12">
                            <div class="swiper sliderFeaturedPosts">
                                <div class="swiper-wrapper">
                                    @foreach ($headlines->slice(0, 5) as $h)
                                        <div class="swiper-slide">
                                            <a href="/berita/{{ $h->slug }}" class="img-bg d-flex align-items-end"
                                                style="background-image: url('{{ asset('storage/' . $h->image) }}');">
                                                <div class="img-bg-inner">
                                                    <h2>{{ $h->title }}</h2>
                                                    <p>{{ $h->excerpt }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="custom-swiper-button-next">
                                    <span class="bi-chevron-right"></span>
                                </div>
                                <div class="custom-swiper-button-prev">
                                    <span class="bi-chevron-left"></span>
                                </div>

                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            @foreach ($headlines->slice(5, 8) as $h)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="post-entry-1">
                                        <a href="{{ url('berita/' . $h->slug) }}"><img
                                                src="{{ asset('storage/' . $h->image) }}" alt=""
                                                class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{ $h->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $h->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2><a href="{{ url('berita/' . $h->slug) }}">{{ $h->title }}</a></h2>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="trending">
                            <h3>Trending</h3>
                            <ul class="trending-post">
                                @foreach ($trending as $t)
                                    <li>
                                        <a href="{{ url('berita/' . $t->slug) }}">
                                            <span class="number">{{ $loop->iteration }}</span>
                                            <h3>{{ $t->title }}</h3>
                                            <span class="author">{{ Str::limit($t->excerpt, 100) }}</span>
                                        </a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Hero Slider Section -->

        <section class="category-section">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>Berita Populer</h2>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        @if ($popular->count())
                            <div class="d-lg-flex post-entry-2">
                                <a href="{{ url('berita/' . $popular[0]->slug) }}"
                                    class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                                    <img src="{{ asset('storage/' . $popular[0]->image) }}" alt=""
                                        class="img-fluid">
                                </a>
                                <div>
                                    <div class="post-meta"><span class="date">{{ $popular[0]->category->name }}</span>
                                        <span class="mx-1">&bullet;</span>
                                        <span>{{ $popular[0]->created_at->diffForHumans() }}</span>
                                    </div>
                                    <h3><a href="{{ url('berita/' . $popular[0]->slug) }}">{{ $popular[0]->title }}</a>
                                    </h3>
                                    <p>{{ Str::limit($popular[0]->excerpt, 300) }}</p>
                                    <div class="d-flex align-items-center author">
                                        <div class="photo"><img src="assets/img/person-2.jpg" alt=""
                                                class="img-fluid">
                                        </div>
                                        <div class="name">
                                            <h3 class="m-0 p-0">{{ $popular[0]->user->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="post-entry-1 border-bottom">
                                        <a href="{{ url('berita/' . $popular[1]->slug) }}"><img
                                                src="{{ asset('storage/' . $popular[1]->image) }}" alt=""
                                                class="img-fluid"></a>
                                        <div class="post-meta"><span
                                                class="date">{{ $popular[1]->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $popular[1]->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2 class="mb-2"><a
                                                href="{{ url('berita/' . $popular[1]->slug) }}">{{ $popular[1]->title }}</a>
                                        </h2>
                                        <span class="author mb-3 d-block">{{ $popular[1]->user->name }}</span>
                                        <p class="mb-4 d-block">{{ Str::limit($popular[1]->excerpt, 150) }}</p>
                                    </div>

                                    <div class="post-entry-1">
                                        <div class="post-meta"><span
                                                class="date">{{ $popular[2]->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $popular[2]->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2 class="mb-2"><a
                                                href="{{ url('berita/' . $popular[2]->slug) }}">{{ $popular[2]->title }}</a>
                                        </h2>
                                        <p class="mb-4 d-block">{{ Str::limit($popular[2]->excerpt, 100) }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="post-entry-1">
                                        <a href="{{ url('berita/' . $popular[3]->slug) }}"><img
                                                src="{{ asset('storage/' . $popular[3]->image) }}" alt=""
                                                class="img-fluid"></a>
                                        <div class="post-meta"><span
                                                class="date">{{ $popular[3]->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $popular[3]->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2 class="mb-2"><a
                                                href="{{ url('berita/' . $popular[3]->slug) }}">{{ $popular[3]->title }}</a>
                                        </h2>
                                        <span class="author mb-3 d-block">{{ $popular[3]->user->name }}</span>
                                        <p class="mb-4 d-block">{{ Str::limit($popular[3]->excerpt, 150) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="col-md-3">
                        @foreach ($popular->slice(4, 11) as $p)
                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">{{ $p->category->name }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $p->created_at->diffForHumans() }}</span>
                                </div>
                                <h2 class="mb-2"><a href="{{ url('berita/' . $p->slug) }}">{{ $p->title }}</a>
                                </h2>
                                <p class="mb-4 d-block">{{ Str::limit($p->excerpt, 100) }}</p>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </section><!-- End Culture Category Section -->

        <!-- ======= Lifestyle Category Section ======= -->
        <section class="category-section">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>Indeks Berita</h2>
                    <div><a href="{{ url('/berita') }}" class="more">Lihat Semua</a></div>
                </div>

                <div class="row g-5">
                    <div class="col-lg-4">
                        @if ($posts->count())
                            <div class="post-entry-1 lg">
                                <a href="{{ url('berita/' . $posts[0]->slug) }}"><img
                                        src="{{ asset('storage/' . $posts[0]->image) }}" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{ $posts[0]->category->name }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $posts[0]->created_at->diffForHumans() }}</span>
                                </div>
                                <h2><a href="{{ url('berita/' . $posts[0]->slug) }}">{{ $posts[0]->title }}</a></h2>
                                <p class="mb-4 d-block">{{ Str::limit($posts[0]->excerpt, 300) }}</p>

                                <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="assets/img/person-7.jpg" alt=""
                                            class="img-fluid"></div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{ $posts[0]->user->name }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">{{ $posts[1]->category->name }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $posts[1]->created_at->diffForHumans() }}</span>
                                </div>
                                <h2 class="mb-2"><a
                                        href="{{ url('berita/' . $posts[1]->slug) }}">{{ $posts[1]->title }}</a></h2>
                                <p class="mb-4 d-block">{{ Str::limit($posts[1]->excerpt, 200) }}</p>
                            </div>

                            <div class="post-entry-1">
                                <div class="post-meta"><span class="date">{{ $posts[2]->category->name }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $posts[2]->created_at->diffForHumans() }}</span>
                                </div>
                                <h2 class="mb-2"><a
                                        href="{{ url('berita/' . $posts[2]->slug) }}">{{ $posts[2]->title }}</a></h2>
                                <p class="mb-4 d-block">{{ Str::limit($posts[2]->excerpt, 200) }}</p>
                            </div>
                        @endif


                    </div>

                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-lg-4 border-start custom-border">
                                @foreach ($posts->slice(3, 3) as $p)
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
                            <div class="col-lg-4 border-start custom-border">
                                @foreach ($posts->slice(6, 3) as $p)
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
                            <div class="col-lg-4">
                                @foreach ($posts->slice(9, 6) as $p)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $p->category->name }}</span> <span
                                                class="mx-1">&bullet;</span>
                                            <span>{{ $p->created_at->diffForHumans() }}</span>
                                        </div>
                                        <h2 class="mb-2"><a
                                                href={{ url('berita/' . $p->slug) }}>{{ $p->title }}</a></h2>
                                        <p class="mb-4 d-block">{{ Str::limit($p->excerpt, 100) }}</p>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>
        </section><!-- End Lifestyle Category Section -->
    </main>
@endsection
