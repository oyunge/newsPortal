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
          
                            <!-- form start -->
                  <form role="form" method="post" action="{{route('admin.post.update', $post->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                    
                     
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="event_name">Post Title</label>
                                <input type="text" name="title" value="{{$post->title}}" class="form-control"  autocomplete="off" required>
                                                                       
                            </div>

                            <div class="form-group">
                                <label for="event_name">Post Category</label>
                                <select name="category_id" class="form-control" id="">
                                    <option value="{{$post->category_id}}" selected>{{$post->category->title}}</option>
                                    @if ($categories->count() >0 )
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    @else
                                        
                                    @endif
                                </select>
                                                                       
                            </div>
                            <div class="form-group">
                                <label for="event_name">Is the News Special?</label>
                                <select name="special" class="form-control" id="">
                                        @if ($post->special)
                                        <option value="1" selected>Yes</option>
                                        
                                        @else
                                        <option value="0" selected>No</option>
                                        @endif
                                        
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                   
                                </select>
                                                                       
                            </div> 

                            <div class="form-group">
                                <label for="event_name">Is this a breaking news?</label>
                                <select name="breaking" class="form-control" id="">
                                    @if ($post->breaking)
                                    <option value="1" selected>Yes</option>
                                    
                                    @else
                                    <option value="0" selected>No</option>
                                    @endif
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                   
                                </select>
                                                                       
                            </div> 

                            
                          </div>

                          <div class="form-group">
                            <label for="image">Post Cover Image</label>
                            <input type="file" name="image" class="form-control">
                                            
                            </div>
                            
                          <div class="form-group">
                            <label for="desc">Short Description</label>
                            <textarea name="short_desc"  class="form-control" cols="30" rows="10">{{$post->short_desc}}</textarea>
                                            
                            </div>

                            <div class="form-group">
                                <label for="long_desc">Long Description</label>
                                <textarea name="long_desc"  class="form-control" id="editor">{{$post->long_desc}}</textarea>
                                                
                                </div>

                        
                       
                      </div>
                       
                      <input type="number" name="user_id" value="{{auth()->id()}}"  class="form-control" autocomplete="off" hidden>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                  
                </div>

            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection