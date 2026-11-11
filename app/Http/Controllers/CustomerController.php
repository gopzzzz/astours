<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
=======
>>>>>>> b5c3e0b96c017bb9aa170d490a335023050c2d38

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')
            ->orderBy('id', 'asc')
<<<<<<< HEAD
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
=======
            ->get();

        return view('customers', compact('customers'));
    }
>>>>>>> b5c3e0b96c017bb9aa170d490a335023050c2d38
}