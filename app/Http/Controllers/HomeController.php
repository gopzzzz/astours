<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function dashboard(){
        $today=date('y-m-d');
        $today_revenue=DB::table('bookingmasters')->where('bookingdate',$today)->sum('received_amount');
        $upcomingtours=DB::table('tours')->where('date','>',$today)->count();
        $newbokkings=DB::table('bookingmasters')->where('booking_status',0)->count();
        $total_customers=DB::table('customers')->count();
        return view('dashboard',compact('today_revenue','upcomingtours','newbokkings','total_customers'));

    }
}
