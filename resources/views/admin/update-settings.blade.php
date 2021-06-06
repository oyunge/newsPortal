@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$page}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$page}}</li>
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
            <div class="col-md-6 offset-md-3">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">{{$page}}</h3>
                  </div>
                  <!-- /.card-header -->
                  @if ($settings !=null)
                            <!-- form start -->
                  <form role="form" method="post" action="{{route('settings.update')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                    
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="event_name">Site Name</label>
                            <input type="text" name="site_name" class="form-control"  value="{{$settings->site_name}}" autocomplete="off" required>
                                          
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="logo">logo</label>
                            <input type="file" name="site_logo" class="form-control" autocomplete="off">
                                          
                          </div>                          
                        </div>
                        
                      </div>
                      <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="site_desc"  class="form-control">{!!$settings->site_desc!!}</textarea>                                          
                      </div>
                      <div class="form-group">
                        <label for="desc">About section</label>
                        <textarea name="about"  class="form-control" id="editor">{!!$settings->about!!}</textarea>                                          
                      </div>
                      <div class="form-group">
                        <label for="facebook">Facebook Link</label>
                        <input type="text" name="facebook" class="form-control" value="{{$settings->facebook}}"  autocomplete="off" >
                                      
                      </div>
                      <div class="form-group">
                        <label for="twitter">Twitter Link</label>
                        <input type="text" name="twitter" class="form-control" value="{{$settings->twitter}}"  autocomplete="off" >
                                      
                      </div>

                      <div class="form-group">
                        <label for="instagram">Instagram Link</label>
                        <input type="text" name="instagram" class="form-control" value="{{$settings->instagram}}"  autocomplete="off" >
                                      
                      </div>
                      <div class="form-group">
                        <label for="twitter">Youtube Link</label>
                        <input type="text" name="youtube" class="form-control" value="{{$settings->youtube}}"  autocomplete="off" >
                                      
                      </div>
                      <div class="form-group">
                        <label for="linkedin">LinkedIn Link</label>
                        <input type="text" name="linkedin" class="form-control" value="{{$settings->linkedin}}"  autocomplete="off" >
                                      
                      </div>
                      
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                  @else
                            <!-- form start -->
                  <form role="form" method="post" action="{{route('settings.update')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                    
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="event_name">Site Name</label>
                            <input type="text" name="site_name" class="form-control"  autocomplete="off" required>            
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="logo">logo</label>
                            <input type="file" name="site_logo" class="form-control" autocomplete="off">
                                          
                          </div>                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="desc">Site Description</label>
                        <textarea name="site_desc"  class="form-control" ></textarea>                                          
                      </div>

                      
                      <div class="form-group">
                        <label for="desc">About section</label>
                        <textarea name="about"  class="form-control" id="editor"></textarea>                                          
                      </div>
                      <div class="form-group">
                        <label for="facebook">Facebook Link</label>
                        <input type="text" name="facebook" class="form-control"  autocomplete="off" >
                                      
                      </div>
                      <div class="form-group">
                        <label for="twitter">Twitter Link</label>
                        <input type="text" name="twitter" class="form-control"  autocomplete="off" >
                                      
                      </div>

                      <div class="form-group">
                        <label for="instagram">Instagram Link</label>
                        <input type="text" name="instagram" class="form-control"  autocomplete="off" >
                                      
                      </div>
                      <div class="form-group">
                        <label for="twitter">Youtube Link</label>
                        <input type="text" name="youtube" class="form-control"  autocomplete="off" >
                                      
                      </div>
                      <div class="form-group">
                        <label for="linkedin">LinkedIn Link</label>
                        <input type="text" name="linkedin" class="form-control"  autocomplete="off" >
                                      
                      </div>
                      
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>
                  @endif
                </div>

            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection