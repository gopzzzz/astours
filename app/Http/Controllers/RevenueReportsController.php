<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RevenueReportsController extends Controller
{
    public function index()
    {
        $revenueReports = DB::table('bookingmasters')
            ->select(
                'id',
                'booking_personname',
                'tour_id',
                'discount',
                'payment_mode',
                'received_amount',
                'pending_amount',
                'totalamount',
                'bookingdate'
              
            )
            ->orderBy('id', 'desc')
            ->where('booking_status',1)
            ->get();

        return view('revenue_reports', compact('revenueReports'));
    }
}