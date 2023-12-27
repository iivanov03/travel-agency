@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>My Bookings</h4>
        </div>
      </div>
    </div>
  </div>


  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
        @if($bookings->count() > 0)
        <table class="table">
            <thead class="">
                <tr class="bg-gray-100">
                    <th scope="col" class="py-3 px-6">ID</th>
                    <th scope="col" class="py-3 px-6">Name</th>
                    <th scope="col" class="py-3 px-6">Phone Number</th>
                    <th scope="col" class="py-3 px-6">Number of Guests</th>
                    <th scope="col" class="py-3 px-6">Check in Date</th>
                    <th scope="col" class="py-3 px-6">Destination</th>
                    <th scope="col" class="py-3 px-6">Price</th>
                    <th scope="col" class="py-3 px-6">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr class="">
                        <th scope="row">{{$booking->id}}</th>
                        <td class="py-4 px-6">{{$booking->name}}</td>
                        <td class="py-4 px-6">{{$booking->phone_number}}</td>
                        <td class="py-4 px-6">{{$booking->num_guest}}</td>
                        <td class="py-4 px-6">{{$booking->check_in_date}}</td>
                        <td class="py-4 px-6">{{$booking->destination}}</td>
                        <td class="py-4 px-6">{{$booking->price}}</td>
                        <td class="py-4 px-6">{{$booking->status}}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        @else
        <p class="alert alert-success">You have no bookings</p>
        @endif
      </div>
    </div>
  </div>
  @endsection