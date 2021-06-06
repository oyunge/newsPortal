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
              <li class="breadcrumb-item"><a href="/admin/homr">Home</a></li>
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
            <div class="col-md-12">
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Video title</th>
                            <th>URL/Link</th>
                            <th>Posted On</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
        
                    <tbody>
                    @if ($videos->count() > 0)
               
                    @foreach ($videos as $video)
                       <tr>
                           <td>{{$video->title}}</td>
                           <td>{!!$video->url!!}</td>
                           <td>{{$video->created_at}}</td>
                           <td><a href="{{route('admin.video.update.form', $video->id)}}"><i class="fa fa-eye"></i>/<i class="fa fa-edit"></i></a></td>
                           <td><a href="{{route('admin.video.destroy', $video->id)}}"><i class="fa fa-trash text-danger"></i></a></td>
                       </tr>
                    @endforeach
              
                    @else
                    <h2>No videos found!</h2> 
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
