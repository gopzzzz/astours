<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')
            ->orderBy('id', 'asc')
             ->paginate(10);

        return view('customers', compact('customers'));
    }
    public function previousbookings($number){
        $bookings = DB::table('bookingmasters')
            ->where('phonenumber',$number)
            ->orderBy('id', 'asc')
            ->get();

        $tours = DB::table('tours')
            ->orderBy('tourname', 'asc')
            ->get();

        return view('booking_masters', compact('bookings', 'tours'));
    }
}