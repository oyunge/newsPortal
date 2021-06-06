@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- Categories-->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$categories->count()}}</h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fa fa-list-alt"></i>
              </div>
              @if (auth()->user()->is_admin)
              <a href="{{route('admin.categories')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              @endif
              
             
            </div>
          </div>


          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$posts->count()}}</h3>

                <p>Posts</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper"></i>
              </div>
              @if (auth()->user()->is_admin)
              <a href="{{route('admin.posts')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              @endif
              
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$users->count()}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              @if (auth()->user()->is_admin)
              <a href="{{route('admin.posts')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              @endif
              
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$events->count()}}</h3>

                <p>Events</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar"></i>
              </div>
              @if (auth()->user()->is_admin)
              <a href="{{route('admin.events')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              @endif
              
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$writer_requests->count()}}</h3>

                <p>Writer requests</p>
              </div>
              <div class="icon">
                <i class="fa fa-edit"></i>
              </div>
              @if (auth()->user()->is_admin)
              <a href="{{route('admin.writer.requests')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              @endif
             
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$writer_requests->count()}}</h3>

                <p>Advert requests</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper"></i>
              </div>
              @if (auth()->user()->is_admin)
              <a href="{{route('admin.advert-requests')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              @endif
           
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{$videos->count()}}</h3>

                <p>Video posts</p>
              </div>
              <div class="icon">
                <i class="fa fa-play"></i>
              </div>
              @if (auth()->user()->is_admin)
              <a href="{{route('admin.videos')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              @endif
              
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$writers->count()}}</h3>

                <p>Writers</p>
              </div>
              <div class="icon">
                <i class="fa fa-play"></i>
              </div>
              @if (auth()->user()->is_admin)
              <a href="{{route('admin.videos')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              @endif
              
              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-6">
      

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Latest Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <table class="table table-bordered table-responsive-sm">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @if ($latest_users->count() > 0)
                    @foreach ($latest_users as $user)
                       <tr>
                         <td>{{$user->name}}</td>
                         <td>{{$user->email}}</td>
                         <td>view</td>
                         <td>delete</td>
                      </tr> 
                    @endforeach
                @else
                  <h2>No users found in the database</h2>  
                @endif
              </tbody>
             </table>
            </div>
            
          </div>

          <div class="col-lg-6">
      

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Latest posts</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <table class="table table-bordered table-responsive-sm">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Views</th>
                  <th>Category</th>
                  
                </tr>
              </thead>
              <tbody>
                @if ($latest_posts->count() > 0)
                    @foreach ($latest_posts as $post)
                       <tr>
                         <td>{{$post->title}}</td>
                         <td>{{$post->views}}</td>
                         <td>{{$post->category->title}}</td>
                         @if (auth()->user()->is_admin)
                         <td><a href="{{route('admin.post.update.form', $post->id)}}"><i class="fa fa-edit"></i></a></td>
                         <td><a href="{{route('admin.post.destroy', $post->id)}}"><i class="fa fa-trash"></i></a></td>
                         @endif
                        
                      </tr> 
                    @endforeach
                @else
                  <h2>No posts found in the database</h2>  
                @endif
              </tbody>
             </table>
            </div>
            
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
