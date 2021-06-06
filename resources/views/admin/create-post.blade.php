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
                  <form role="form" method="post" action="{{route('admin.post.create')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                    
                     
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="event_name">Post Title</label>
                                <input type="text" name="title" class="form-control"  autocomplete="off" required>
                                                                       
                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="event_name">Categories</label>
                            <select name="category_id" class="form-control" id="">
                                @if ($categories->count() >0 )
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                @else
                                    
                                @endif
                            </select>
                                                                   
                        </div>
                        </div>
                           <div class="row">
                             <div class="col-md-6">
                              <div class="form-group">
                                <label for="event_name">Is the News Special?</label>
                                <select name="special" class="form-control" id="">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                   
                                </select>
                                                                       
                            </div> 
                             </div>
                             <div class="col-md-6">
                              <div class="form-group">
                                <label for="event_name">Is this a breaking news?</label>
                                <select name="breaking" class="form-control" id="">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                   
                                </select>                                      
                            </div> 
                             </div>
                           </div>
                          
                          <div class="form-group">
                            <label for="image">Post Cover Image</label>
                            <input type="file" name="image" class="form-control">
                                            
                            </div>

                          <div class="form-group">
                            <label for="short_desc">Short Description</label>
                            <textarea name="short_desc"  class="form-control" cols="30" rows="10"></textarea>
                                            
                            </div>

                      
                       
                      <div class="form-group">
                      <label for="long_desc">Description</label>
                      <textarea name="long_desc" id="editor"  class="form-control" ></textarea>
                                      
                      </div>
                      <input type="number" name="user_id" value="{{auth()->id()}}"  class="form-control" autocomplete="off" hidden>
                   
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Create</button>
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