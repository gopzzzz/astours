<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\BookingMaster;
use App\Models\BookingTrans;
use App\Models\Tour;

class WebController extends Controller
{
    public function index(){
        $today=date('y-m-d');
       $latest_tours=DB::table('tours')->limit(3)->where('date','>',$today)->latest()->get();
       $reviews=DB::table('blogs')->limit(3)->latest()->get();
       $banners=DB::table('banners')->get();
        return view('web.index',compact('latest_tours','reviews','banners'));

    }
    public function aboutus(){
         return view('web.aboutus');
    }
    public function grouptours(){
  

   
  $today = now()->format('Y-m-d');
$monthend = now()->endOfMonth()->format('Y-m-d');

$grouptours = DB::table('tours')
    ->whereBetween('date', [$today, $monthend])
    ->orderBy('date', 'asc')
    ->get();

    // echo "<pre>";print_r($grouptours);exit;
    
          return view('web.packages',compact('grouptours'));
    }
    public function contacts(){
        return view('web.contacts');
    }
      public function calender(){
       $calender = DB::table('tours')
    ->whereBetween('date', [
        now()->toDateString(),
        now()->addMonths(3)->toDateString()
    ])
    ->orderBy('date', 'asc')
    ->get();
        return view('web.calender',compact('calender'));
    }
      public function booknow($slug){
        $tour=DB::table('tours')->where('slug',$slug)->first();
        $totalbookings = DB::table('bookingmasters')
            ->leftJoin('bookingtrans', 'bookingmasters.id', '=', 'bookingtrans.bookid')
            ->where('bookingmasters.tour_id', $tour->id)
            ->count('bookingtrans.id');
          $available_seats=$tour->total_seats-$totalbookings;
    $bookedseats = DB::table('bookingmasters')
    ->leftJoin('bookingtrans', 'bookingmasters.id', '=', 'bookingtrans.bookid')
    ->where('bookingmasters.tour_id', $tour->id)
    ->pluck('bookingtrans.seatnumber')
    ->map(fn($seat) => (int) $seat)
    ->values()
    ->toArray();
        return view('web.booknow',compact('tour','available_seats','bookedseats'));
    }
   public function confirm(Request $request)
{
    $tourId = $request->tour_id;
    $totalSeat = $request->total_seat;
    // echo $totalSeat;exit;
    $seats = array_filter(
    array_map('trim', explode(',', $totalSeat))
);

  $totalCount = count($seats);
    
    $tour=DB::table('tours')->where('id',$tourId)->first();
   $locations = array_filter(
    array_map('trim', explode(',', $tour->pickuplocations ?? ''))
);
    return view('web.confirmbooking',compact('seats','tourId','tour','locations','totalCount'));
}
public function trainbooking(Request $request){
 $tourId = $request->tour_id;

$totalCount = (int) $request->total_members;

$seats = array_map('strval', range(1, $totalCount));
   
    $tour=DB::table('tours')->where('id',$tourId)->first();
   $locations = array_filter(
    array_map('trim', explode(',', $tour->pickuplocations ?? ''))
);
    return view('web.confirmbooking',compact('seats','tourId','tour','locations','totalCount'));
}

public function enquirynow(Request $request){


   $request->validate([
        'booking_personname' => 'required|string|max:255',
        'phonenumber'        => 'required|string|max:20',
        'mail'               => 'nullable|email|max:255',
        'address'            => 'nullable|string',
        'totalnumber'        => 'required|integer|min:1',
        'tour_id'            => 'required|exists:tours,id',
        'totalamount'        => 'required|numeric|min:0',
        'bookingdate'        => 'required|date',
        'pickuplocation'     => 'nullable|string|max:255',
      

        'passengers'                       => 'required|array|min:1',
        'passengers.*.customername'        => 'required|string|max:255',
        'passengers.*.age'                 => 'required|integer|min:1',
        'passengers.*.phonenumber'         => 'nullable|string|max:20',
        'passengers.*.seatnumber'          => 'nullable|string|max:20',
    ]);

    // DB::beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | Create Booking Master
        |--------------------------------------------------------------------------


        */

        $firstPassenger = $request->passengers[0] ?? null;

        $phone = $firstPassenger['phonenumber'] ?? null;


       
        // Check customer already exists
        $customer = DB::table('customers')
            ->where('phonenumber', $phone)
            ->first();

        if ($customer) {

            // Existing customer
            $cus_id = $customer->id;

        } else {

            // Create new customer
            $cus_id = DB::table('customers')->insertGetId([
                'name'         =>$firstPassenger['customername'] ?? null,
                'phonenumber' => $firstPassenger['phonenumber'] ?? null,
                'mail' => $request->mail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $tours=DB::table('tours')->where('id',$request->tour_id)->first();

       
       
      

        $booking = new BookingMaster();

        $booking->booking_personname =  $firstPassenger['customername'] ?? null;
        $booking->phonenumber        =  $firstPassenger['phonenumber'] ?? null;
        $booking->mail               = $request->mail;
        $booking->address            = $request->address;
        $booking->totalnumber        = $request->totalnumber;
        $booking->tour_id            = $request->tour_id;
        $booking->packagecost        = $tours->amount;
        $booking->totalamount        = $request->totalamount;
        $booking->bookingdate        = $request->bookingdate;
        $booking->pickuplocation     = $request->pickuplocation;
        $booking->payment_status     = 0;
        $booking->payment_mode       = 0;
        $booking->received_amount    = 0;
        $booking->pending_amount     = $request->totalamount;
        $booking->cus_id             = $cus_id;
        $booking->discount           = 0;
        $booking->booking_status =  0;
        $booking->emergency_number= $request->phonenumber;
        $booking->relationship     =$request->booking_personname;
        $booking->save();

       


        /*
        |--------------------------------------------------------------------------
        | Store Passenger / Booking Transactions
        |--------------------------------------------------------------------------
        */

        foreach ($request->passengers as $index => $passenger) {

            $bookingTrans = new BookingTrans();

            $bookingTrans->bookid            = $booking->id;
            $bookingTrans->customername      = $passenger['customername'];
            $bookingTrans->age               = $passenger['age'];
            $bookingTrans->phonenumber       = $passenger['phonenumber'] ?? null;
            
            $bookingTrans->seatnumber        = 0;


            $bookingTrans->save();
        }


        /*
        |--------------------------------------------------------------------------
        | Commit
        |--------------------------------------------------------------------------
        */

        // DB::commit();
 
        return redirect('success');
           

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with('error', 'Booking failed: ' . $e->getMessage());
    }             
}
public function showsucess(){
  return view('web.success');
}
public function addreview(Request $request){
   $request->validate([
        'name'   => 'required|string|max:255',
        'review' => 'required|string', 
        'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {

        $imageName = time() . '_' .
            uniqid() . '.' .
            $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            public_path('uploads'),
            $imageName
        );
    }

    DB::table('blogs')->insert([
        'blogname'    => $request->name,
        'description' => $request->review,
        'image'       => $imageName,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    return back()->with(
        'success',
        'Review submitted successfully!'
    );
}

public function submit(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'phone'   => 'required|string|max:30',
        'place'   => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    DB::table('enquires')->insert([
        'name'       => $request->name,
        'phonenumber'      => $request->phone,
        'location'      => $request->place,
        'message'    => $request->message,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'Your inquiry has been sent successfully!');
}
public function reviews($id){
    $review=DB::table('blogs')->where('id',$id)->first();
 return view('web.reviews',compact('review'));
}
public function reviewslist(){
     $reviews=DB::table('blogs')->latest()->get();
 return view('web.reviewslist',compact('reviews'));
}
}
