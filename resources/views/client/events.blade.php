@extends('layouts.client')
@section('content')
<div class="row">
    <div class="col-sm-12">
      <div class="card" data-aos="fade-up">
        <div class="card-body">
          <div class="aboutus-wrapper">
            <table class="table table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th>Event Title</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
    
                <tbody>
                @if ($events->count() > 0)
           
                @foreach ($events as $event)
                   <tr>
                       <td>{{$event->title}}</td>
                       <td>{!!$event->desc!!}</td>
                       <td>{{$event->date}}</td>
                   </tr>
                @endforeach
          
                @else
                <h2>No events found!</h2> 
                @endif
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection