<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\City\City;
use App\Models\Country\Country;
use Illuminate\Http\Request;

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
}
