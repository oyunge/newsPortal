<?php
$settings = App\Models\Setting::latest()->first();
$categories = App\Models\Category::latest()->take(7)->get();
$posts = App\Models\Post::latest()->take(5)->get();
$breaking = App\Models\Post::where('breaking', 1)->latest()->first();

?>
<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{$settings->site_name}}</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{asset('client/assets/vendors/mdi/css/materialdesignicons.min.css')}}"
    />
    <link rel="stylesheet" href="{{asset('client/assets/vendors/aos/dist/aos.css/aos.css')}}" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{asset('client/assets/images/favicon.png')}}" />

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('client/assets/css/style.css')}}">
    <!-- endinject -->
    @toastr_css
  </head>

  <body>
    <div class="container-scroller">
        <div class="main-panel">
                    <!-- partial:partials/_navbar.html -->
        <header id="header">
            <div class="container">
              <nav class="navbar navbar-expand-lg navbar-light">
                <div class="navbar-top">
                  <div class="d-flex justify-content-between align-items-center">
                    <ul class="navbar-top-left-menu">
                      <li class="nav-item">
                        <a href="{{route('advertise.form')}}" class="nav-link">Advertise</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('about.us')}}" class="nav-link">About</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('client.events')}}" class="nav-link">Events</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('become.writer.form')}}" class="nav-link">Write for Us</a>
                      </li>

                      @if (auth()->check() && auth()->user()->is_admin || auth()->check() && auth()->user()->is_writer)
                      <li class="nav-item">
                        <a href="/admin/home" class="btn btn-success">Dashboard</a>
                      </li>
                      @endif
                     
                    </ul>
                    <ul class="navbar-top-right-menu">
                      <li class="nav-item">
                        <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                      </li>
                      @if (auth()->check())
                      <li class="nav-item">
                        <a href="/" class="nav-link">{{auth()->user()->name}}</a>
                      </li>
                      <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-block">
                          @csrf
                          <input type="submit" class="btn text-light" value="Logout">
                      </form>
                      </li>  
                      @else
                      <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link">Login</a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">Sign up</a>
                      </li>  
                      @endif
                    </ul>
                  </div>
                </div>
                <div class="navbar-bottom">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      @if ($settings->site_logo)
                      <a class="navbar-brand" href="/"
                      ><img src="{{asset('storage/settings/logo/'.$settings->site_logo)}}" alt=""
                    /></a> 
                      @else
                      <a class="navbar-brand" href="#"
                      >{{$settings->site_name}}</a> 
                      @endif
                    </div>
                    <div>
                      <button
                        class="navbar-toggler"
                        type="button"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                      >
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div
                        class="navbar-collapse justify-content-center collapse"
                        id="navbarSupportedContent"
                      >
                        <ul
                          class="navbar-nav d-lg-flex justify-content-between align-items-center"
                        >
                          <li>
                            <button class="navbar-close">
                              <i class="mdi mdi-close"></i>
                            </button>
                          </li>
                          <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                          </li>
                          @if ($categories->count() > 0)
                            @foreach ($categories as $category)
                            <li class="nav-item">
                              <a class="nav-link" href="{{route('client.category', $category->id)}}">{{$category->title}}</a>
                            </li> 
                            @endforeach  
                          @else
                              
                          @endif
                       
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('contact.us.form')}}">Contact</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <ul class="social-media">
                      <li>
                        <a href="{{$settings->facebook}}">
                            <i class="mdi mdi-facebook"></i>
                        </a>
                        </li>
                        <li>
                        <a href="{{$settings->youtube}}">
                            <i class="mdi mdi-youtube"></i>
                        </a>
                        </li>
                        <li>
                        <a href="{{$settings->twitter}}">
                            <i class="mdi mdi-twitter"></i>
                        </a>
                        </li>
                        <li>
                          <a href="{{$settings->instagram}}">
                              <i class="mdi mdi-instagram"></i>
                          </a>
                          </li>
                        <li>
                          <a href="{{$settings->linkedin}}">
                              <i class="mdi mdi-linkedin"></i>
                          </a>
                          </li>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
          </header>

            <!-- partial -->
            <div class="flash-news-banner">
            <div class="container">
               @if ($breaking !=null)
              <a class="text-dark" href="{{route('client.post', $breaking->id)}}">
                <div class="d-lg-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                      <span class="badge badge-dark mr-3">{{$breaking->category->title}}</span>
                      <p class="mb-0">
                        {{$breaking->title}}
                      </p>
                  </div>
                  <div class="d-flex">
                      <span class="mr-3 text-danger">{{$breaking->created_at}}</span>
                      {{-- <span class="text-danger">30°C,London</span> --}}
                  </div>
                  </div>
              </a>
               @else
                   
               @endif
            </div>
            </div>

            <div class="content-wrapper">
                <div class="container">
                    @yield('content')
                </div>
            </div>

        

    <!-- partial:partials/_footer.html -->
    <footer>
        <div class="footer-top">
            <div class="container">
            <div class="row">
                <div class="col-sm-5">
                <img src="assets/images/logo.svg" class="footer-logo" alt="" />
                <h5 class="font-weight-normal mt-4 mb-5">
                   {{$settings->site_desc}}
                </h5>
                <ul class="social-media mb-3">
                    <li>
                    <a href="{{$settings->facebook}}">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                    </li>
                    <li>
                    <a href="{{$settings->youtube}}">
                        <i class="mdi mdi-youtube"></i>
                    </a>
                    </li>
                    <li>
                    <a href="{{$settings->twitter}}">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                    </li>
                    <li>
                      <a href="{{$settings->instagram}}">
                          <i class="mdi mdi-instagram"></i>
                      </a>
                      </li>
                      <li>
                        <a href="{{$settings->linkedin}}">
                            <i class="mdi mdi-linkedin"></i>
                        </a>
                        </li>
                </ul>
                </div>
                <div class="col-sm-4">
                <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
               
                  @if ($posts->count() > 0)
                      @foreach ($posts as $post)
                          <a class="text-light" href="{{route('client.post', $post->id)}}">
                            <div class="row">
                              <div class="col-sm-12">
                              <div class="footer-border-bottom pb-2">
                                  <div class="row">
                                  <div class="col-3">
                                      <img
                                      src="{{asset('storage/posts/'.$post->image)}}"
                                      alt="thumb"
                                      class="img-fluid"
                                      />
                                  </div>
                                  <div class="col-9">
                                      <h5 class="font-weight-600">
                                      {{$post->title}}
                                      </h5>
                                  </div>
                                  </div>
                              </div>
                              </div>
                          </div>
                          </a>
                      @endforeach
                  @else
                      
                  @endif
                </div>
                <div class="col-sm-3">
                <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
               
                @if($categories->count() > 0)
                  @foreach ($categories as $category)
                  <a class="text-light" href="{{route('client.category', $category->id)}}">
                    <div class="footer-border-bottom pb-2 pt-2">
                      <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">{{$category->title}}</h5>
                      <div class="count">{{$category->posts->count()}}</div>
                      </div>
                  </div>
                  </a>
                  @endforeach
                @else

                @endif

                </div>
            </div>
            </div>
        </div>
    

        <div class="footer-bottom">
            <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                    © 2021 @ <a href="/" target="_blank" class="text-white"> {{$settings->site_name}}</a>. All rights reserved.
                    </div>
                    <div class="fs-14 font-weight-600">
                    {{-- Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a> --}}
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </footer>

        <!-- partial -->
    </div>
    </div>
    <!-- inject:js -->
    <script src="{{asset('client/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('client/assets/vendors/aos/dist/aos.js/aos.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('client/assets/js/demo.js')}}"></script>
    <script src="{{asset('client/assets/js/jquery.easeScroll.js')}}"></script>
    <!-- End custom js for this page-->
    @jquery
    @toastr_js
    @toastr_render
    </body>
</html>