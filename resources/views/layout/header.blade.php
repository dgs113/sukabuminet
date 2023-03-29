     <!-- ======= Header ======= -->
     <header id="header" class="header d-flex align-items-center fixed-top">
         <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

             <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                 <!-- Uncomment the line below if you also wish to use an image logo -->
                 <img src="assets/img/logo_sukabuminet.png" alt="">
                 {{-- <h1>Sukabumi<span class="text-secondary">NET</span></h1> --}}
             </a>

             <nav id="navbar" class="navbar">
                 <ul>
                     @foreach ($category as $c)
                         <li><a href="{{ url('category/' . $c->slug) }}">{{ $c->name }}</a></li>
                     @endforeach
                     <li><a href="{{ url('videos') }}">Videos</a></li>
                     <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                     {{-- <li><a href="single-post.html">Single Post</a></li>
              <li class="dropdown"><a href="category.html"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="search-result.html">Search Result</a></li>
                  <li><a href="#">Drop Down 1</a></li>
                  <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                      <li><a href="#">Deep Drop Down 1</a></li>
                      <li><a href="#">Deep Drop Down 2</a></li>
                      <li><a href="#">Deep Drop Down 3</a></li>
                      <li><a href="#">Deep Drop Down 4</a></li>
                      <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Drop Down 2</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
                </ul>
              </li> --}}

                     {{-- <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li> --}}
                 </ul>
             </nav><!-- .navbar -->

             <div class="position-relative">
                 <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
                 <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
                 <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

                 <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
                 <i class="bi bi-list mobile-nav-toggle"></i>

                 <!-- ======= Search Form ======= -->
                 <div class="search-form-wrap js-search-form-wrap">
                     <form action="/berita" class="search-form" on>
                         <span class="icon bi-search"></span>
                         <input type="text" name="search" placeholder="Search" class="form-control"
                             value="{{ request('search') }}">
                         <input type="submit" hidden>
                         <button class="btn js-search-close" type="button"><span class="bi-x"></span></button>
                     </form>
                 </div><!-- End Search Form -->

             </div>

         </div>

     </header><!-- End Header -->
