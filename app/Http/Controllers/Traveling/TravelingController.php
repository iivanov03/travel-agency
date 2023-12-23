<?php

namespace App\Http\Controllers\Traveling;

use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Http\Request;

class TravelingController extends Controller
{
    public function about($id)
    {
        $cities = City::select()->orderBy('id', 'desc')->take(5)->where('country_id', $id)->get();

        $country = Country::find($id);

        $citiesCount = City::select()->where('country_id', $id)->count();

        return view('traveling.about', compact('cities', 'country', 'citiesCount'));
    }

}
