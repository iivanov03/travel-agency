@extends('layouts.app')

@section('content')
<div class="about-main-content" style="background-image: url('{{asset('assets/images/country-01.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content" >
            <div class="blur-bg" style="background-image: url('{{asset('assets/images/country-01.jpg')}}')"></div>
                    <a id="pay-button" href="{{route('traveling.success')}}" class=" main-button">Pay: {{"$price"}}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection