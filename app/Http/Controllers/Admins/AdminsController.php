<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\City\City;
use App\Models\Country\Country;
use App\Models\Reservation\Reservation;
use Hash;
use File;
use Illuminate\Http\Request;
use Redirect;

class AdminsController extends Controller
{
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $req)
    {
        $remember_me = $req->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $req->input("email"), 'password' => $req->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {

        $countriesCount = Country::select()->count();
        $citiesCount = City::select()->count();
        $adminsCount = Admin::select()->count();

        return view('admins.index', compact('countriesCount', 'citiesCount', 'adminsCount'));
    }

    public function allAdmins()
    {

        $allAdmins = Admin::select()->orderBy('id', 'desc')->get();

        return view('admins.allAdmins', compact('allAdmins'));
    }

    public function createAdmins(Request $req)
    {
        return view('admins.createAdmins');
    }

    public function storeAdmins(Request $req)
    {
        $storeAdmins = Admin::create([
            "name" => $req->name,
            "email" => $req->email,
            "password" => Hash::make($req->password),
        ]);
        if ($storeAdmins) {
            return Redirect::route('admins.all.admins')->with(['create' => 'Admin created successfully']);
        }
        return view('admins.createAdmins');
    }

    public function allCountries()
    {
        $allCountries = Country::select()->orderBy('id', 'desc')->get();

        return view('admins.allCountries', compact('allCountries'));
    }

    public function createCountry()
    {
        return view('admins.createCountries');
    }

    public function storeCountry(Request $req)
    {
        Request()->validate([
            "name" => "required|max:40",
            "population" => "required|max:40",
            "territory" => "required|max:40",
            "avg_price" => "required|max:40",
            "description" => "required|max:300",
            "image" => "required|mimes:jpeg,png,jpg,gif",
            "continent" => "required|max:40"
        ]);

        $destinationPath = 'assets/images/';
        $myImage = $req->image->getClientOriginalName();
        $req->image->move(public_path($destinationPath), $myImage);

        $storeCountries = Country::create([
            'name' => $req->name,
            'population' => $req->population,
            'territory' => $req->territory,
            'avg_price' => $req->avg_price,
            'description' => $req->description,
            'image' => $myImage,
            'continent' => $req->continent,
        ]);
        if ($storeCountries) {
            return Redirect::route('all.countries')->with(['success' => 'Country created successfully']);
        }

        return view('admins.createCountries');
    }

    public function deleteCountry($id)
    {
        $deleteCountry = Country::find($id);

        if (File::exists(public_path('assets/images/' . $deleteCountry->image))) {
            File::delete(public_path('assets/images/' . $deleteCountry->image));
        } else {
            //dd('File does not exists.');
        }
        $deleteCountry->delete();
        if ($deleteCountry) {
            return Redirect::route('all.countries')->with(['success' => 'Country deleted successfully']);
        }


        return view('admins.allCountries');
    }

    public function allCities()
    {
        $allCities = City::select()->orderBy('id', 'desc')->get();

        return view('admins.allCities', compact('allCities'));
    }

    public function createCity()
    {
        $countries = Country::all();
        return view('admins.createCities', compact('countries'));
    }

    public function storeCity(Request $req)
    {
        Request()->validate([
            "name" => "required|max:40",
            "image" => "required|mimes:jpeg,png,jpg,gif",
            'num_days' => "required|max:40",
            'price' => "required|max:5",
            'country_id' => "required|max:5",
        ]);

        $destinationPath = 'assets/images/';
        $myImage = $req->image->getClientOriginalName();
        $req->image->move(public_path($destinationPath), $myImage);

        $storeCity = City::create([
            'name' => $req->name,
            'image' => $myImage,
            'num_days' => $req->num_days,
            'price' => $req->price,
            'country_id' => $req->country_id
        ]);
        if ($storeCity) {
            return Redirect::route('all.cities')->with(['success' => 'City created successfully']);
        }

        return view('admins.createCities');
    }

    public function deleteCity($id)
    {
        $deleteCity = City::find($id);

        if (File::exists(public_path('assets/images/' . $deleteCity->image))) {
            File::delete(public_path('assets/images/' . $deleteCity->image));
        } else {
            //dd('File does not exists.');
        }
        $deleteCity->delete();
        if ($deleteCity) {
            return Redirect::route('all.cities')->with(['success' => 'City deleted successfully']);
        }


        return view('admins.allCities');
    }

    public function allBookings()
    {
        $allBookings = Reservation::select()->orderBy('id', 'desc')->get();

        return view('admins.allBookings', compact('allBookings'));
    }

    public function editBooking($id)
    {
        $booking = Reservation::find($id);

        return view('admins.editBooking', compact('booking'));
    }

    public function updateBooking(Request $req, $id)
    {

        Request()->validate([
            "status" => "in:pending,confirmed,cancelled,completed",
        ]);

        $booking = Reservation::find($id);

        $booking->update($req->all());

        if ($booking) {
            return Redirect::route('all.bookings')->with(['success' => 'Booking updated successfully']);
        }

        return view('admins.editBooking', compact('booking'));
    }

    public function deleteBooking($id)
    {
        $deleteBooking = Reservation::find($id);


        $deleteBooking->delete();
        if ($deleteBooking) {
            return Redirect::route('all.bookings')->with(['success' => 'Booking deleted successfully']);
        }


        return view('admins.allBookings');
    }
}
