<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BorderController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;



Route::view('/', 'auth.login');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/country', CountryController::class .'@index')->name('countries.index');
Route::get('/countries/create', CountryController::class . '@create')->name('countries.create');
Route::post('/countries', CountryController::class .'@store')->name('countries.store');
Route::get('/countries/{country}', CountryController::class .'@show')->name('countries.show');
Route::get('/countries/{country}/edit', CountryController::class .'@edit')->name('countries.edit');
Route::post('/countries/{country}', CountryController::class .'@update')->name('countries.update');
Route::delete('/countries/{country}', CountryController::class .'@destroy')->name('categories.destroy');

Route::get('/city', CityController::class .'@index')->name('cities.index');
Route::get('/cities/create', CityController::class . '@create')->name('cities.create');
Route::post('/cities', CityController::class .'@store')->name('cities.store');
Route::get('/cities/{city}', CityController::class .'@show')->name('cities.show');
Route::get('/cities/{city}/edit', CityController::class .'@edit')->name('cities.edit');
Route::put('/cities/{city}', CityController::class .'@update')->name('cities.update');
Route::delete('/cities/{city}', CityController::class .'@destroy')->name('cities.destroy');


Route::get('/borders', BorderController::class .'@index')->name('borders.index');
Route::get('/borders/create', BorderController::class . '@create')->name('borders.create');
Route::post('/borders', BorderController::class .'@store')->name('borders.store');
Route::get('/borders/{border}', BorderController::class .'@show')->name('borders.show');
Route::get('/borders/{border}/edit', BorderController::class .'@edit')->name('borders.edit');
Route::put('/borders/{border}', BorderController::class .'@update')->name('borders.update');
Route::delete('/borders/{border}', BorderController::class .'@destroy')->name('borders.destroy');


Route::get('/routes', RouteController::class .'@index')->name('routes.index');
Route::get('/routes/create', RouteController::class . '@create')->name('routes.create');
Route::post('/routes', RouteController::class .'@store')->name('routes.store');
Route::get('/routes/{route}', RouteController::class .'@show')->name('routes.show');
Route::get('/routes/{route}/edit', RouteController::class .'@edit')->name('routes.edit');
Route::put('/routes/{route}', RouteController::class .'@update')->name('routes.update');
Route::delete('/routes/{route}', RouteController::class .'@destroy')->name('routes.destroy');


Route::get('/customers', CustomerController::class .'@index')->name('customers.index');
Route::get('/customers/create', CustomerController::class . '@create')->name('customers.create');
Route::post('/customers', CustomerController::class .'@store')->name('customers.store');
Route::get('/customers/{customer}', CustomerController::class .'@show')->name('customers.show');
Route::get('/customers/{customer}/edit', CustomerController::class .'@edit')->name('customers.edit');
Route::put('/customers/{customer}', CustomerController::class .'@update')->name('customers.update');
Route::delete('/customers/{customer}', CustomerController::class .'@destroy')->name('customers.destroy');


Route::get('/clients', ClientController::class .'@index')->name('clients.index');
Route::get('/clients/create', ClientController::class . '@create')->name('clients.create');
Route::post('/clients', ClientController::class .'@store')->name('clients.store');
Route::get('/clients/{client}', ClientController::class .'@show')->name('clients.show');
Route::get('/clients/{client}/edit', ClientController::class .'@edit')->name('clients.edit');
Route::put('/clients/{client}', ClientController::class .'@update')->name('clients.update');
Route::delete('/clients/{client}', ClientController::class .'@destroy')->name('clients.destroy');

Route::get('/trucks', TruckController::class .'@index')->name('trucks.index');
Route::get('/trucks/create', TruckController::class . '@create')->name('trucks.create');
Route::post('/trucks', TruckController::class .'@store')->name('trucks.store');
Route::get('/trucks/{truck}', TruckController::class .'@show')->name('trucks.show');
Route::get('/trucks/{truck}/edit', TruckController::class .'@edit')->name('trucks.edit');
Route::put('/trucks/{truck}', TruckController::class .'@update')->name('trucks.update');
Route::delete('/trucks/{truck}', TruckController::class .'@destroy')->name('trucks.destroy');


Route::get('/drivers', DriverController::class .'@index')->name('drivers.index');
Route::get('/drivers/create', DriverController::class . '@create')->name('drivers.create');
Route::post('/drivers', DriverController::class .'@store')->name('drivers.store');
Route::get('/drivers/{driver}', DriverController::class .'@show')->name('drivers.show');
Route::get('/drivers/{driver}/edit', DriverController::class .'@edit')->name('drivers.edit');
Route::put('/drivers/{driver}', DriverController::class .'@update')->name('drivers.update');
Route::delete('/drivers/{driver}', DriverController::class .'@destroy')->name('drivers.destroy');


Route::get('/bookings', BookingController::class .'@index')->name('bookings.index');
Route::get('/bookings/create', BookingController::class . '@create')->name('bookings.create');
Route::post('/bookings', BookingController::class .'@store')->name('bookings.store');
Route::get('/bookings/{booking}', BookingController::class .'@show')->name('bookings.show');
Route::get('/bookings/{booking}/edit', BookingController::class .'@edit')->name('bookings.edit');
Route::put('/bookings/{booking}', BookingController::class .'@update')->name('bookings.update');
Route::delete('/bookings/{booking}', BookingController::class .'@destroy')->name('bookings.destroy');
Route::get('/get-driver-details/{id}', 'App\Http\Controllers\BookingController@getDriverDetails');

Auth::routes();


Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');


Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin/dashboard',function(){
    return view('admin');
})->middleware('auth:admin');
