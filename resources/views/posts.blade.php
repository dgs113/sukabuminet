@extends('layout/main')

@section('container')
    <!-- ======= Posts Begin ======= -->
    <section id="search-result" class="search-result mt-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="category-title">{{ $page_title }}</h3>

                    @foreach ($posts as $p)
                        <div class="d-md-flex post-entry-2 small-img">
                            <a href="{{ url('berita/' . $p->slug) }}" class="me-4 thumbnail">
                                <img src="{{ asset('storage/' . $p->image) }}" alt="" class="img-fluid">
                            </a>
                            <div>
                                <div class="post-meta"><span class="date">{{ $p->category->name }}</span> <span
                                        class="mx-1">&bullet;</span> <span>{{ $p->created_at->diffForHumans() }}</span>
                                </div>
                                <h3><a href="{{ url('berita/' . $p->slug) }}">{{ $p->title }}</a></h3>
                                <p>{{ $p->excerpt }}</p>
                                <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="" alt="" class="img-fluid"></div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{ $p->user->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex flex-column">

                        {{ $posts->links() }}
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
                            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                                @foreach ($terbaru->slice(0, 5) as $t)
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
    </section> <!-- End Search Result -->
@endsection
