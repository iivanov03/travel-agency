<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth:web');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::group(['prefix' => 'traveling'], function () {
    Route::get('/about/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'about'])->name('traveling.about');

    Route::get('/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'makeReservations'])->name('traveling.reservation');
    Route::post('/reservation/{id}', [App\Http\Controllers\Traveling\TravelingController::class, 'storeReservations'])->name('traveling.reservation.store');

    Route::get('/pay', [App\Http\Controllers\Traveling\TravelingController::class, 'pay'])->name('traveling.pay')->middleware('check.for.price');
    Route::get('/success', [App\Http\Controllers\Traveling\TravelingController::class, 'successPayment'])->name('traveling.success')->middleware('check.for.price');

    Route::get('/deals', [App\Http\Controllers\Traveling\TravelingController::class, 'deals'])->name('traveling.deals');
    Route::any('/search-deals', [App\Http\Controllers\Traveling\TravelingController::class, 'searchDeals'])->name('traveling.deals.search');

});

Route::get('users/bookings', [App\Http\Controllers\Users\UsersController::class, 'bookings'])->name('users.bookings')->middleware('auth:web');


Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
;
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admins.all.admins');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('admins.create');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('admins.store');

    Route::get('/all-countries', [App\Http\Controllers\Admins\AdminsController::class, 'allCountries'])->name('all.countries');
    Route::get('/create-countries', [App\Http\Controllers\Admins\AdminsController::class, 'createCountry'])->name('create.countries');
    Route::post('/create-countries', [App\Http\Controllers\Admins\AdminsController::class, 'storeCountry'])->name('store.countries');
    Route::get('/delete-countries/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCountry'])->name('delete.countries');

    Route::get('/all-cities', [App\Http\Controllers\Admins\AdminsController::class, 'allCities'])->name('all.cities');
    Route::get('/create-cities', [App\Http\Controllers\Admins\AdminsController::class, 'createCity'])->name('create.cities');
    Route::post('/create-cities', [App\Http\Controllers\Admins\AdminsController::class, 'storeCity'])->name('store.cities');
    Route::get('/delete-cities/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCity'])->name('delete.cities');

    Route::get('/all-bookings', [App\Http\Controllers\Admins\AdminsController::class, 'allBookings'])->name('all.bookings');
    Route::get('/edit-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editBooking'])->name('edit.bookings');
    Route::post('/update-booking/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateBooking'])->name('update.bookings');
});