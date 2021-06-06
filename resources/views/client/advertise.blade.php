@extends('layouts.client')
@section('content')
<div class="row">
    <div class="col-sm-12">
      <div class="card" data-aos="fade-up">
        <div class="card-body">
          <div class="aboutus-wrapper">
            <form method="POST" action="{{ route('advertise') }}">
                @csrf

        

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Enter Your Phone') }}</label>

                    <div class="col-md-6">
                        <input  type="text" value="" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                    </div>
                    
                        <input  type="number" value="{{auth()->id()}}" name="user_id" hidden>

                </div>

              

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send request') }}
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection