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
              <li class="breadcrumb-item active">User profile</li>
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
          <div class="col-md-8 offset-md-2">
            <section class="content mt-5 ">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-3">
    
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if ($user->image)
                                        <img class="profile-user-img img-fluid img-circle"  src="{{asset('/storage/profile/'.$user->image)}}" alt="User profile picture">
                                        @else
                                        <img class="profile-user-img img-fluid img-circle"  src="{{asset('storage/images/profile.png')}}" alt="User profile picture"> 
                                        @endif
                                    </div>
    
                                    <h3 class="profile-username text-center">{{$user->name}}</h3>
    
                                    <p class="text-muted text-center">{{$user->email}}</p>
    
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                           
                                        </li><br>
                                        <li class="list-group-item">
                                            <form action="{{route('admin.image.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" class="form-control" name="image">
                                                <input type="submit" class="form-control" value="Update Photo">
                                            </form>
                                        </li>
                                       
                                    </ul>
    
                                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
    
                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i>Email</strong>
    
                                    <p class="text-muted">
                                        {{$user->email}}
                                    </p>
    
                                    <hr>
    
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
    
                                    <p class="text-muted">{{$user->country}}</p>
    
                                    <hr>
    
                                   
    
                                    <strong><i class="far fa-file-alt mr-1"></i> Bio</strong>
    
                                    <p class="text-muted">{{$user->bio}}</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
    
    
    
    
    
    
                        <div class="col-md-9">
    
    
    
    
    
    
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                      
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                      
    
                                        <div class="tab-pane active" id="settings">
    
    
                                            <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="form-horizontal">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="name" class="form-control" value="{{$user->name}}" id="inputName" placeholder="" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" value="{{$user->email}}"  class="form-control" id="inputEmail" placeholder="Email" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone"   class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" value="{{$user->phone}}" class="form-control" name="phone" placeholder="Phone">
                                                    </div>
                                                </div>
                                               
                                               
    
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">profession</label>
                                                    <div class="col-sm-10">
                                                        <input type="text " class="form-control" name="profession" value="{{$user->profession}}" placeholder="Your profession">
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Country</label>
                                                    <div class="col-sm-10">
                                                        <input type="text " class="form-control" value="{{$user->country}}" name="country" placeholder="Your Country">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text " class="form-control" value="{{$user->address}}" name="address" placeholder="Your Address">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">State</label>
                                                    <div class="col-sm-10">
                                                        <input type="text " class="form-control" value="{{$user->state}}" name="state" placeholder="Your State">
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Your Bio</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control"  name="bio" placeholder="A short introduction about yourself eg.a Fullstack software engineer)">{{$user->bio}}</textarea>
                                                    </div>
                                                </div>

                                                @if (auth()->check() && auth()->id() == $user->id)
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password " class="form-control" value="" name="password" placeholder="Warning! updating this field will change your password">
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Update details</button>
                                                    </div>
                                                </div>
                                                @else
                                                   
                                                @endif
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection