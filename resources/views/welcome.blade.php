@extends('layouts.client')

@section('content')
<div class="row" data-aos="fade-up">
    <div class="col-xl-8 stretch-card grid-margin">
    @if ($latest_breaking_news != null)
    <a href="{{ $latest_breaking_news->id)}}">
      <div class="position-relative">
        <img
          src="{{asset('storage/posts/'.$latest_breaking_news->image)}}"
          alt="banner"
          class="img-fluid"
        />
        <div class="banner-content">
          <div class="badge badge-danger fs-12 font-weight-bold mb-3">
            {{$latest_breaking_news->category->title}}
          </div>
          <h1 class="mb-0"></h1>
          <h1 class="mb-2">
            {{$latest_breaking_news->title}} - {{$latest_breaking_news->short_desc}}
          </h1>
          <div class="fs-12">
            <span class="mr-2">Posted </span>{{$latest_breaking_news->created_at->diffForHumans()}}
          </div>
        </div>
      </div>
    </a>
    @else
    <div class="position-relative">
      <img
        src="{{asset('storage/posts/'.$latest_breaking_news->image)}}"
        alt="banner"
        class="img-fluid"
      />
      <div class="banner-content">
        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
          global news
        </div>
        <h1 class="mb-0">GLOBAL PANDEMIC</h1>
        <h1 class="mb-2">
          Coronavirus Outbreak LIVE Updates: ICSE, CBSE Exams
          Postponed, 168 Trains
        </h1>
        <div class="fs-12">
          <span class="mr-2">Photo </span>10 Minutes ago
        </div>
      </div>
    </div> 
    @endif
    </div>
    <div class="col-xl-4 stretch-card grid-margin">
      <div class="card bg-dark text-white">
        <div class="card-body">
          <h2>Latest news</h2>

          @if ($latest_news->count() > 0)
              @foreach ($latest_news as $news)
              <a class="text-light" href="{{route('client.post', $news->id)}}">
                <div
              class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between"
            >
              <div class="pr-3">
                <h5>{{$news->title}}</h5>
                <div class="fs-12">
                  <span class="mr-2">Posted: </span>{{$news->created_at->diffForHumans()}}
                </div>
              </div>
              <div class="rotate-img">
                <img
                  src="{{asset('storage/posts/'.$news->image)}}"
                  alt="thumb"
                  class="img-fluid img-lg"
                />
              </div>
            </div>
              </a>
              @endforeach
          @else
              <h5>No Latest news found</h5>
          @endif

        </div>
      </div>
    </div>
  </div>

  <div class="row" data-aos="fade-up">
    <div class="col-lg-3 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          <h2>Category</h2>
          <ul class="vertical-menu">
            @if ($categories->count() > 0)
            @foreach ($categories as $category)
            <li><a href="{{route('client.category', $category->id)}}">{{$category->title}}</a></li>
            @endforeach
            @else
                <h3>No categories Found</h3>
            @endif
            
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-9 stretch-card grid-margin">
      <div class="card">
        <div class="card-body">
          @if ($breaking_news->count() > 0)
              @foreach ($breaking_news as $news)
            <a href="{{route('client.post', $news->id)}}" class="text-dark">
              <div class="row">
                <div class="col-sm-4 grid-margin">
                  <div class="position-relative">
                    <div class="rotate-img">
                      <img
                        src="{{asset('storage/posts/'.$news->image)}}"
                        alt="thumb"
                        class="img-fluid"
                      />
                    </div>
                    <div class="badge-positioned">
                      <span class="badge badge-danger font-weight-bold"
                        >{{$news->category->title}}</span
                      >
                    </div>
                  </div>
                </div>
                <div class="col-sm-8  grid-margin">
                  <h2 class="mb-2 font-weight-600">
                    {{$news->title}}
                  </h2>
                  <div class="fs-13 mb-2">
                    <span class="mr-2">Posted: </span>{{$news->created_at->diffForHumans()}}
                  </div>
                  <p class="mb-0">
                    {{$news->short_desc}}
                  </p>
                </div>
              </div>
            </a><hr>
    
              @endforeach
          @else
             <h5>No breaking news items</h5> 
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row" data-aos="fade-up">
    <div class="col-sm-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8">
              <div class="card-title">
                Video
              </div>
              <div class="row">
                
                @if ($videos->count() > 0)
                   @foreach ($videos as $video)
                  <a href="{{$video->url}}">
                    <div class="col-sm-6 grid-margin">
                      <div class="position-relative">
                        <div class="rotate-img">
                          <img
                            src="{{asset('storage/videos/'.$video->image)}}" width="200"  height="200"
                            alt="thumb"
                            class="img-fluid"
                          />
                        </div>
                        <div class="badge-positioned w-90">
                          <div
                            class="d-flex justify-content-between align-items-center"
                          >
                            <span
                              class="badge badge-danger font-weight-bold"
                              >{{$video->category->title}}</span
                            >
                            <div class="video-icon">
                              <i class="mdi mdi-play"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a> 
                   @endforeach 
                @else
                   <h3>No video posts found</h3> 
                @endif


                
              </div>

              
            </div>
            <div class="col-lg-4">
              <div
                class="d-flex justify-content-between align-items-center"
              >
                <div class="card-title">
                  Latest Video
                </div>
                <p class="mb-3">See all</p>
              </div>
             @if ($latest_videos->count() > 0)
                 @foreach ($latest_videos as $video)
                 <a href="{{$video->url}}">
                  <div
                  class="d-flex justify-content-between align-items-center border-bottom pb-2"
                >
                  <div class="div-w-80 mr-3">
                    <div class="rotate-img">
                      <img
                        src="{{asset('storage/videos/'.$video->image)}}"
                        alt="thumb"
                        class="img-fluid"
                      />
                    </div>
                  </div>
                  <h3 class="font-weight-600 mb-0 text-primary">
                    {{$video->title}}
                  </h3>
                </div> 
                </a>
                 @endforeach
             @else
                 
             @endif
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection