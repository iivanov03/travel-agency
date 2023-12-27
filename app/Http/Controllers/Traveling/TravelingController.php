<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Country\Country;
use App\Models\Reservation\Reservation;
use Auth;
use Illuminate\Http\Request;
use Session;

class TravelingController extends Controller
{
    public function about($id)
    {
        $cities = City::select()->orderBy('id', 'desc')->take(5)->where('country_id', $id)->get();

        $country = Country::find($id);

        $citiesCount = City::select()->where('country_id', $id)->count();

        return view('traveling.about', compact('cities', 'country', 'citiesCount'));
    }


    public function makeReservations($id)
    {
        $city = City::find($id);

        return view('traveling.reservation', compact('city'));
    }


    // public function storeReservations(Request $req, $id)
    // {

    //     $city = City::find($id);
    //     if ($req->check_in_date > date('Y-m-d')) {

    //         $totalPrice = (int) $city->price * (int) $req->num_guests;

    //         $storeReservation = Reservation::create([
    //             "name" => $req->name,
    //             "phone_number" => $req->phone_number,
    //             "num_guests" => $req->num_guests,
    //             "check_in_date" => $req->check_in_date,
    //             "destination" => $req->destination,
    //             "price" => $totalPrice,
    //             "user_id" => Auth::user()->id,
    //             // "city" => $req->city
    //         ]);

    //         if ($storeReservation) {
    //             Session::put('price', $city->price * $req->num_guests);
    //             $newPrice = Session::get('price');

    //             if ($newPrice) {
    //                 return Redirect::route('traveling.pay');
    //             }
    //         }
    //     } else {
    //         echo "choose date in the future";
    //     }


    //     return view('traveling.reservation', compact('city'));
    // }

    public function storeReservations(Request $req, $id)
    {
        $city = City::find($id);

        if ($req->check_in_date > date('Y-m-d')) {
            $totalPrice = (float) $city->price * (int) $req->num_guest;

            $storeReservation = Reservation::create([
                "name" => $req->name,
                "phone_number" => $req->phone_number,
                "num_guest" => $req->num_guest,
                "check_in_date" => $req->check_in_date,
                "destination" => $city->name,
                "price" => $totalPrice,
                "user_id" => Auth::user()->id,
            ]);

            if ($storeReservation) {
                Session::put('price', $totalPrice);
                $newPrice = Session::get('price');

                if ($newPrice) {
                    return redirect()->route('traveling.pay')->with('price', $totalPrice);
                }
            }
        } else {
            return back()->with('error', 'Please choose a date in the future.');
        }

        return back()->with(compact('city'))->with('error', 'Could not create reservation.');
    }

    public function pay()
    {
        $price = Session::get('price');
        return view('traveling.pay', compact('price'));
    }

    public function successPayment()
    {
        return view('traveling.success');
    }

    public function deals()
    {
        $countries = Country::all();
        $cities = City::select()->orderBy('id', 'desc')->take(4)->get();
        return view('traveling.deals', compact('cities', 'countries'));
    }

    public function searchDeals(Request $req)
    {
        $countries = Country::all();
        $country_id = $req->get('country_id');
        $price = $req->get('price');

        $searches = City::where('country_id', $country_id)->where('price', '<=', $price)->orderBy('id', 'desc')->take(4)->get();
        return view('traveling.searchDeals', compact('searches', 'countries'));
    }
}
