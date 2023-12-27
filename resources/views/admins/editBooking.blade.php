@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Update Booking Status</h5>
          <p>Current status: <b>{{$booking->status}}</b></p>
      <form method="POST" action="{{route('update.bookings', $booking->id)}}" enctype="multipart/form-data">
        @csrf
            <div class="form-outline mb-4 mt-4">
              <select name="status" class="form-select  form-control" aria-label="Default select example">
                <option selected>Choose Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="completed">Completed</option>
              </select>
            </div>
            @if($errors->has('status'))
                <p class="alert alert-danger">{{ $errors->first('status') }}</p>
            @endif
    <br>
    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection