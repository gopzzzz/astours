<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\AddonsController;
use App\Http\Controllers\StaffRegistrationsController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingMastersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UploadsController;
use App\Http\Controllers\RevenueReportsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\EnquiriesController;
use App\Http\Controllers\BannersController;

Route::get('/logout', function (Request $request) {
    Auth::logout();
        $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');


    
Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



 Route::get('/page', [HomeController::class, 'page'])->name('page.list');



Route::get('/departments', [DepartmentsController::class, 'index'])
    ->name('departments.index');

Route::post('/departments', [DepartmentsController::class, 'store'])
    ->name('departments.store');

Route::put('/departments/{id}', [DepartmentsController::class, 'update'])
    ->name('departments.update');

    Route::get('/addons', [AddonsController::class, 'index'])
    ->name('addons.index');

Route::post('/addons', [AddonsController::class, 'store'])
    ->name('addons.store');

Route::put('/addons/{id}', [AddonsController::class, 'update'])
    ->name('addons.update');



 

Route::get('/staff-registrations', [StaffRegistrationsController::class, 'index'])
    ->name('staff_registrations.index');

Route::post('/staff-registrations', [StaffRegistrationsController::class, 'store'])
    ->name('staff_registrations.store');

Route::put('/staff-registrations/{id}', [StaffRegistrationsController::class, 'update'])
    ->name('staff_registrations.update');





Route::any('/tours', [ToursController::class, 'index'])
    ->name('tours.index');

Route::get('/tours/export', [ToursController::class, 'export'])
    ->name('tours.export');

Route::get('/tours/{id}', [ToursController::class, 'show']);

Route::post('/tours', [ToursController::class, 'store'])
    ->name('tours.store');

Route::put('/tours/{id}', [ToursController::class, 'update'])
    ->name('tours.update');


Route::get('/bookings', [BookingController::class, 'index'])
    ->name('bookings.index');

Route::post('/bookings', [BookingController::class, 'store'])
    ->name('bookings.store');

Route::any('/bookinglist', [BookingController::class, 'list'])
    ->name('bookings.list');
    
Route::get('/bookings/export', [BookingController::class, 'export'])
    ->name('bookings.export');

Route::get('/bookings/passengerexport', [BookingController::class, 'passengerexport'])
    ->name('bookings.passengerexport');

Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])
    ->name('bookings.edit');

Route::put('/booking/{id}', [BookingController::class, 'update'])
    ->name('bookings.update');

Route::put('/bookings/{id}', [BookingController::class, 'update'])
    ->name('bookings.update');

Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])
    ->name('bookings.edit');

Route::get('/booking/{id}', [BookingController::class, 'show'])
    ->name('bookings.show');

Route::get('/tour-pickup-locations/{tour_id}', 
    [BookingController::class, 'getPickupLocations']
)->name('tour.pickup.locations');

Route::get('/check-seat/{tour_id}/{seat_number}',
    [BookingController::class, 'checkSeat']
)->name('check.seat');







Route::get('/blogs', [BlogsController::class, 'index'])
    ->name('blogs.index');

Route::post('/blogs', [BlogsController::class, 'store'])
    ->name('blogs.store');

Route::put('/blogs/{id}', [BlogsController::class, 'update'])
    ->name('blogs.update');

Route::delete('/blogs/{id}', [BlogsController::class, 'destroy'])
    ->name('blogs.destroy');








Route::get('/upload-images', [UploadsController::class, 'index'])
    ->name('uploads.index');

Route::post('/upload-images', [UploadsController::class, 'store'])
    ->name('uploads.store');

Route::delete('/upload-images/{id}', [UploadsController::class, 'destroy'])
    ->name('uploads.destroy');



Route::get('/revenue-reports', [RevenueReportsController::class, 'index'])
    ->name('revenue_reports.index');

Route::get('/customers', [CustomerController::class, 'index'])
    ->name('customers.index');

Route::get('/customers', [CustomerController::class, 'index'])
    ->name('customers.index');

Route::get('/previousbookings/{phone}', [CustomerController::class, 'previousBookings'])
    ->name('previousbookings');

    


Route::get('/enquiries', [EnquiriesController::class, 'index'])
    ->name('enquiries.index');

Route::post('/enquiries', [EnquiriesController::class, 'store'])
    ->name('enquiries.store');

Route::put('/enquiries/{id}', [EnquiriesController::class, 'update'])
    ->name('enquiries.update');

Route::delete('/enquiries/{id}', [EnquiriesController::class, 'destroy'])
    ->name('enquiries.destroy');








Route::get('/banners', [BannersController::class, 'index'])
    ->name('banners.index');

Route::post('/banners', [BannersController::class, 'store'])
    ->name('banners.store');

Route::put('/banners/{id}', [BannersController::class, 'update'])
    ->name('banners.update');

Route::delete('/banners/{id}', [BannersController::class, 'destroy'])
    ->name('banners.destroy');



});



Route::get('/', function () {
   return redirect('/index');
});



    //website route 

  Route::get('/index', [WebController::class, 'index'])->name('index');
  
  Route::get('/aboutus', [WebController::class, 'aboutus'])->name('aboutus');
  Route::get('/grouptours', [WebController::class, 'grouptours'])->name('grouptours');
  Route::get('/booknow/{slug}', [WebController::class, 'booknow'])->name('booknow');
  Route::get('/calender-packages', [WebController::class, 'calender'])->name('calender-packages');
  Route::post('/booking/confirm', [WebController::class, 'confirm'])
    ->name('booking.confirm');
  Route::post('/booking/trainbooking', [WebController::class, 'trainbooking'])
    ->name('booking.trainbooking');
  Route::post('/success-enquiry', [WebController::class, 'enquirynow'])->name('success-enquiry');

Route::get('/success', [WebController::class, 'showsucess'])->name('success');
      Route::post('/addreview', [WebController::class, 'addreview'])
    ->name('addreview');
Route::post('/contact-submit', [WebController::class, 'submit'])
    ->name('contact.submit');

    Route::get('/reviews/{id}', [WebController::class, 'reviews'])
    ->name('reviews');

        Route::get('/reviewslist', [WebController::class, 'reviewslist'])
    ->name('reviewslist');
 

require __DIR__.'/auth.php';
