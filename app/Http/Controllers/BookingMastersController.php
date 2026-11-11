<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingMastersController extends Controller
{
    // =========================================
    // LIST BOOKINGS
    // =========================================

    public function index()
    {
        $bookings = DB::table('bookingmasters')
            ->orderBy('id', 'asc')
            ->get();

        $tours = DB::table('tours')
            ->orderBy('tourname', 'asc')
            ->get();

        return view('booking_masters', compact('bookings', 'tours'));
    }


    // =========================================
    // ADD BOOKING
    // =========================================

    public function store(Request $request)
    {
        $request->validate([
            'booking_personname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'address' => 'required|string',

            'totalnumber' => 'required|string|max:45',

            'tour_id' => 'required|integer',

            'totalamount' => 'required|numeric|min:0',

            'bookingdate' => 'required|date',

            'pickuplocation' => 'required|string|max:255',

            'payment_status' => 'required|integer',

            'payment_mode' => 'required|integer',

            'received_amount' => 'required|numeric|min:0',

            'pending_amount' => 'required|numeric|min:0',

            'cus_id' => 'required|integer',
        ]);

        $touramount=DB::table('tours')->where('id',$request->tour_id)->value('amount');


        DB::table('bookingmasters')->insert([

            'booking_personname' => $request->booking_personname,

            'phonenumber' => $request->phonenumber,

            'mail' => $request->mail,

            'address' => $request->address,

            'totalnumber' => $request->totalnumber,

            'tour_id' => $request->tour_id,

            'totalamount' => $request->totalamount,

            'bookingdate' => $request->bookingdate,

            'pickuplocation' => $request->pickuplocation,

            'payment_status' => $request->payment_status,

            'payment_mode' => $request->payment_mode,

            'packagecost' =>$touramount,

            'received_amount' => $request->received_amount,

            'pending_amount' => $request->pending_amount,

            'cus_id' => $request->cus_id,

            // 0 = Pending
            'booking_status' => 0,

            'created_at' => now(),

            'updated_at' => now(),
        ]);


        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking added successfully.');
    }


    // =========================================
    // UPDATE BOOKING
    // =========================================

    public function update(Request $request, $id)
    {
        $request->validate([
            'booking_personname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'address' => 'required|string',

            'totalnumber' => 'required|string|max:45',

            'tour_id' => 'required|integer',

            'totalamount' => 'required|numeric|min:0',

            'bookingdate' => 'required|date',

            'pickuplocation' => 'required|string|max:255',

            'payment_status' => 'required|integer',

            'payment_mode' => 'required|integer',

            'received_amount' => 'required|numeric|min:0',

            'pending_amount' => 'required|numeric|min:0',

            'cus_id' => 'required|integer',
        ]);


        DB::table('bookingmasters')
            ->where('id', $id)
            ->update([

                'booking_personname' => $request->booking_personname,

                'phonenumber' => $request->phonenumber,

                'mail' => $request->mail,

                'address' => $request->address,

                'totalnumber' => $request->totalnumber,

                'tour_id' => $request->tour_id,

                'totalamount' => $request->totalamount,

                'bookingdate' => $request->bookingdate,

                'pickuplocation' => $request->pickuplocation,

                'payment_status' => $request->payment_status,

                'payment_mode' => $request->payment_mode,

                'received_amount' => $request->received_amount,

                'pending_amount' => $request->pending_amount,

                'cus_id' => $request->cus_id,

                'updated_at' => now(),
            ]);


        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }


    // =========================================
    // SHOW SINGLE BOOKING
    // =========================================

    public function show($id)
    {
        $booking = DB::table('bookingmasters')
            ->where('id', $id)
            ->first();

        if (!$booking) {
            return redirect()
                ->route('bookings.index')
                ->with('error', 'Booking not found.');
        }

        return view('booking_show', compact('booking'));
    }


    // =========================================
    // EDIT PAGE
    // =========================================

    public function edit($id)
    {
        $booking = DB::table('bookingmasters')
            ->where('id', $id)
            ->first();

        if (!$booking) {
            return redirect()
                ->route('bookings.index')
                ->with('error', 'Booking not found.');
        }

        $tours = DB::table('tours')
            ->orderBy('tourname', 'asc')
            ->get();

        return view('booking_edit', compact('booking', 'tours'));
    }


    // =========================================
    // BOOKING LIST
    // =========================================

    public function list()
    {
        $bookings = DB::table('bookingmasters')
            ->orderBy('id', 'asc')
            ->get();

        return view('bookinglist', compact('bookings'));
    }
}