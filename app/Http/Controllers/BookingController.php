<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\BookingMaster;
use App\Models\BookingTrans;
use App\Models\Tour;


class BookingController extends Controller
{
     
    public function index()
    {
        $today=date('y-m-d');
        $tours = DB::table('tours')
           ->where('date','>',$today)
            ->orderBy('id', 'asc')
            ->get();

        return view('bookings', compact('tours'));
    }
public function getPickupLocations($tour_id)
{
     $tour = DB::table('tours')
        ->where('id', $tour_id)
        ->first();

    if (!$tour) {
        return response()->json([
            'success' => false
        ]);
    }

   $locations = array_filter(
    array_map('trim', explode(',', $tour->pickuplocations))
);

    return response()->json([
        'success' => true,
        'pickup_locations' => array_values($locations),
        'price' => $tour->amount
    ]);
}


    // ADD
  public function store(Request $request)
{
    $request->validate([
        'booking_personname' => 'nullable|string|max:255',
        'phonenumber'        => 'nullable|string|max:20',
        'mail'               => 'nullable|email|max:255',
        'address'            => 'nullable|string',
        'totalnumber'        => 'required|integer|min:1',
        'tour_id'            => 'required|exists:tours,id',
        'totalamount'        => 'required|numeric|min:0',
        'bookingdate'        => 'required|date',
        'pickuplocation'     => 'nullable|string|max:255',
        'payment_status'     => 'required|in:0,1,2',
        'payment_mode'       => 'required|in:1,2,3',
        'received_amount'    => 'nullable|numeric|min:0',
        'pending_amount'     => 'nullable|numeric|min:0',
        'cus_id'             => 'nullable',

        'passengers'                       => 'required|array|min:1',
        'passengers.*.customername'        => 'required|string|max:255',
        'passengers.*.age'                 => 'required|integer|min:1',
        'passengers.*.phonenumber'         => 'nullable|string|max:20',
        'passengers.*.adharcardnumber'     => 'nullable|string|max:20',
        'passengers.*.adharcardpf'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'passengers.*.seatnumber'          => 'nullable|string|max:20',
    ]);

    DB::beginTransaction();

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
                'mail' => $firstPassenger['mail'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

       $touramount=DB::table('tours')->where('id',$request->tour_id)->value('amount');


      

      

        $booking = new BookingMaster();

        $booking->booking_personname = $firstPassenger['customername'] ?? null;
        $booking->phonenumber        = $firstPassenger['phonenumber'] ?? null;
        
        $booking->totalnumber        = $request->totalnumber;
        $booking->tour_id            = $request->tour_id;
        $booking->totalamount       = $request->totalamount;
        $booking->packagecost        = $touramount;
        $booking->bookingdate        = $request->bookingdate;
        $booking->pickuplocation     = $request->pickuplocation;
        $booking->payment_status     = $request->payment_status;
        $booking->payment_mode       = $request->payment_mode;
        $booking->received_amount    = $request->received_amount ?? 0;
        $booking->pending_amount     = $request->pending_amount ?? 0;
        $booking->cus_id             = $cus_id;
        $booking->discount             = $request->discount;
        $booking->emergency_number             = $request->phonenumber;
        $booking->relationship             = $request->booking_personname;
        $booking->booking_status = ($booking->received_amount > 0) ? 1 : 0;
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
            $bookingTrans->adharcardnumber   = $passenger['adharcardnumber'] ?? null;
            $bookingTrans->seatnumber        = $passenger['seatnumber'] ?? null;


            /*
            |--------------------------------------------------------------------------
            | Aadhaar File Upload
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile("passengers.$index.adharcardpf")) {

                $file = $request->file("passengers.$index.adharcardpf");

                $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();

                $file->move(
                    public_path('uploads/adharcard'),
                    $filename
                );

                $bookingTrans->adharcardpf = $filename;
            }

            $bookingTrans->save();
        }


        /*
        |--------------------------------------------------------------------------
        | Commit
        |--------------------------------------------------------------------------
        */

        DB::commit();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking created successfully.');

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with('error', 'Booking failed: ' . $e->getMessage());
    }
}
public function checkSeat($tour_id, $seat_number)
{
    // Get tour maximum seats
    $tour = DB::table('tours')
        ->where('id', $tour_id)
        ->first();

    if (!$tour) {
        return response()->json([
            'booked' => false,
            'valid' => false,
            'message' => 'Tour not found.'
        ]);
    }

    // Check seat number against maximum seats
    if (!is_numeric($seat_number) || $seat_number < 1 || $seat_number > $tour->total_seats) {
        return response()->json([
            'booked' => false,
            'valid' => false,
            'message' => 'Invalid seat number. Available seats are 1 to ' . $tour->total_seats
        ]);
    }

    // Check whether seat is already booked
    $booked = DB::table('bookingmasters')
        ->join('bookingtrans', 'bookingtrans.bookid', '=', 'bookingmasters.id')
        ->where('bookingmasters.tour_id', $tour_id)
        ->where('bookingtrans.seatnumber', $seat_number)
        ->exists();

    return response()->json([
        'booked' => $booked,
        'valid' => true,
        'message' => $booked
            ? 'Seat ' . $seat_number . ' is already booked.'
            : 'Seat available.'
    ]);
}
public function list(Request $request)
{
    $userId = auth()->id();

$user = DB::table('users')
    ->where('id', $userId)
    ->first();

$role = $user->role;

$bookings = BookingMaster::with([
        'tour',
        'transactions'
    ])
    ->leftJoin('tours', 'bookingmasters.tour_id', '=', 'tours.id')

    ->when($request->filled('search'), function ($query) use ($request) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('booking_personname', 'like', '%' . $search . '%')
              ->orWhere('mail', 'like', '%' . $search . '%')
              ->orWhere('phonenumber', 'like', '%' . $search . '%');
        });
    })

    ->when($request->filled('tour_id'), function ($query) use ($request) {
        $query->where('bookingmasters.tour_id', $request->tour_id);
    });


// Staff users can only see their own tours
// if ($role != 1) {

//     $staffid = DB::table('staff_registrations')
//         ->where('user_id', $userId)
//         ->value('id');

//     $bookings->where('tours.staff_id', $staffid);
// }


$bookings = $bookings
    ->when($request->filled('from_date'), function ($query) use ($request) {
        $query->whereDate('bookingdate', '>=', $request->from_date);
    })

    ->when($request->filled('to_date'), function ($query) use ($request) {
        $query->whereDate('bookingdate', '<=', $request->to_date);
    })

    ->select('bookingmasters.*')
    ->latest('bookingmasters.created_at')
    ->paginate(10)
    ->withQueryString();


$tours = DB::table('tours');

// if ($role != 1) {

//     $staffid = DB::table('staff_registrations')
//         ->where('user_id', $userId)
//         ->value('id');

//     $tours->where('tours.staff_id', $staffid);
// }

$tours = $tours
    ->latest()
    ->get();

return view('bookinglist', compact('bookings', 'tours'));
}

public function export(Request $request)
{
   $userId = auth()->id();

$user = DB::table('users')
    ->where('id', $userId)
    ->first();

$role = $user->role;

$bookings = BookingMaster::with([
        'tour',
        'transactions'
    ])
    ->leftJoin('tours', 'bookingmasters.tour_id', '=', 'tours.id')

    ->when($request->filled('search'), function ($query) use ($request) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('booking_personname', 'like', '%' . $search . '%')
              ->orWhere('mail', 'like', '%' . $search . '%')
              ->orWhere('phonenumber', 'like', '%' . $search . '%');
        });
    })

    ->when($request->filled('tour_id'), function ($query) use ($request) {
        $query->where('bookingmasters.tour_id', $request->tour_id);
    });


// Staff users can only see their own tours
if ($role != 1) {

    $staffid = DB::table('staff_registrations')
        ->where('user_id', $userId)
        ->value('id');

    $bookings->where('tours.staff_id', $staffid);
}


$bookings = $bookings
    ->when($request->filled('from_date'), function ($query) use ($request) {
        $query->whereDate('bookingdate', '>=', $request->from_date);
    })

    ->when($request->filled('to_date'), function ($query) use ($request) {
        $query->whereDate('bookingdate', '<=', $request->to_date);
    })
        ->latest()
        ->select('bookingmasters.*','tours.tourname')
        ->get();

    return response()->streamDownload(function () use ($bookings) {

        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'Booking ID',
            'Customer Name',
            'Email',
            'Phone',
            'Booking Date',
            'Tour',
            'Addons',
            'Pick up Location',
            'Total Members',
            'Package Cost',
            'Addon Amount',
            'Discount',
            'Received Amount',
            'Pending Amount',
            'Total Amount',
        ]);

        foreach ($bookings as $booking) {

        $addonsid = explode(',', $booking->addons);

        $addons = DB::table('addons')
            ->whereIn('id', $addonsid)
            ->pluck('addon')
            ->toArray();

        $addonnames = implode(', ', $addons);
          

            fputcsv($file, [
                $booking->id,
                $booking->booking_personname,
                $booking->mail,
                $booking->phonenumber,
                $booking->bookingdate,
                optional($booking->tour)->tourname,
                $addonnames,
                $booking->pickuplocation,
                $booking->totalnumber,
                $booking->packagecost,
                $booking->addonamount,
                $booking->discount,
                $booking->received_amount,
                $booking->pending_amount,
                $booking->totalamount,
                
            ]);
        }

        fclose($file);

    }, 'bookings.csv');
}

public function passengerexport(Request $request)
{
    $userId = auth()->id();

    $user = DB::table('users')
        ->where('id', $userId)
        ->first();

    if (!$user) {
        abort(403, 'User not found.');
    }

    $role = $user->role;

    $query = DB::table('bookingmasters')
        ->join('bookingtrans', 'bookingmasters.id', '=', 'bookingtrans.bookid')
        ->leftJoin('tours', 'bookingmasters.tour_id', '=', 'tours.id')
        ->where('bookingmasters.addonamount', '<=', 0);

    // Search passenger details
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('bookingtrans.customername', 'like', "%{$search}%")
              ->orWhere('bookingtrans.mail', 'like', "%{$search}%")
              ->orWhere('bookingtrans.phonenumber', 'like', "%{$search}%");
        });
    }

    // Filter by tour
    if ($request->filled('tour_id')) {
        $query->where('bookingmasters.tour_id', $request->tour_id);
    }

    // Staff users can only see their own tours
    if ($role != 1) {
        $staffId = DB::table('staff_registrations')
            ->where('user_id', $userId)
            ->value('id');

        $query->where('tours.staff_id', $staffId);
    }

    // Filter by booking date
    if ($request->filled('from_date')) {
        $query->whereDate(
            'bookingmasters.bookingdate',
            '>=',
            $request->from_date
        );
    }

    if ($request->filled('to_date')) {
        $query->whereDate(
            'bookingmasters.bookingdate',
            '<=',
            $request->to_date
        );
    }

    $bookings = $query
        ->select([
            'bookingtrans.customername',
            'bookingtrans.phonenumber',
            'bookingtrans.age',
            'bookingtrans.seatnumber',
            'tours.tourname',
            'bookingmasters.bookingdate',
             'bookingmasters.emergency_number',
              'bookingmasters.relationship',
        ])
        ->orderByDesc('bookingmasters.bookingdate')
        ->get();

    return response()->streamDownload(function () use ($bookings) {
        $file = fopen('php://output', 'w');

        // CSV column headings
        fputcsv($file, [
            'Tour Name',
            'Booking Date',
            'Passenger Name',
            'Phone Number',
            'Age',
            'Seat Number',
            'Emergenct Contact',
            'Emergency Person with Relationship',
        ]);

        foreach ($bookings as $booking) {
            fputcsv($file, [
                $booking->tourname,
                $booking->bookingdate,
                $booking->customername,
                $booking->phonenumber,
                $booking->age,
                $booking->seatnumber,
                $booking->emergency_number,
                $booking->relationship,
            ]);
        }

        fclose($file);
    }, 'passengerdetails.csv', [
        'Content-Type' => 'text/csv',
    ]);
}

public function show($id)
{
    $booking = BookingMaster::with([
        'tour',
        'transactions'
    ])->findOrFail($id);
    

    return view('show', compact('booking'));
}

public function edit($id)
{
    $booking = BookingMaster::with([
        'tour',
        'transactions'
    ])->findOrFail($id);

  $count=DB::table('bookingtrans')->where('bookid',$id)->count();

  $tours = Tour::where('id', $booking->tour_id)->first();

$pickupLocations = $tours && $tours->pickuplocations
    ? array_map('trim', explode(',', $tours->pickuplocations))
    : [];

    $addons=DB::table('addons')->get();
    

        // echo "<pre>";print_r($pickupLocations );exit;

    return view('bookingsedit', compact(
        'booking',
        'tours',
        'pickupLocations',
        'count',
        'addons'
    ));
}

  public function update(Request $request, $id)
{
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
        'payment_status'     => 'required|in:0,1,2',
        'payment_mode'       => 'required|in:1,2,3',
        'received_amount'    => 'nullable|numeric|min:0',
        'pending_amount'     => 'nullable|numeric|min:0',
        'cus_id'             => 'nullable',

        'passengers' => 'required|array|min:1',

        'passengers.*.customername' =>
            'required|string|max:255',

        'passengers.*.age' =>
            'required|integer|min:1',

        'passengers.*.phonenumber' =>
            'nullable|string|max:20',

        'passengers.*.adharcardnumber' =>
            'nullable|string|max:20',

        'passengers.*.seatnumber' =>
            'nullable|string|max:20',

        'passengers.*.adharcardpf' =>
            'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    DB::beginTransaction();

    try {

        $selectedAddons = $request->input('addons', []);

        $addons = implode(',', $selectedAddons);

        /*
        |--------------------------------------------------------------------------
        | Booking Master
        |--------------------------------------------------------------------------
        */

        $booking = BookingMaster::findOrFail($id);

        $booking->booking_personname = $request->booking_personname;
        $booking->phonenumber        = $request->phonenumber;
        $booking->mail               = $request->mail;
        $booking->address            = $request->address;
        $booking->totalnumber        = $request->totalnumber;
        $booking->tour_id            = $request->tour_id;
        $booking->totalamount        = $request->totalamount;
        $booking->bookingdate        = $request->bookingdate;
        $booking->pickuplocation     = $request->pickuplocation;
        $booking->payment_status     = $request->payment_status;
        $booking->payment_mode       = $request->payment_mode;
        $booking->received_amount    = $request->received_amount ?? 0;
        $booking->pending_amount     = $request->pending_amount ?? 0;
        $booking->booking_status = ($booking->received_amount > 0) ? 1 : 0;
        $booking->cus_id             = $request->cus_id;
        $booking->addons             =$addons;
        $booking->addonamount        =$request->addonamount;
        $booking->save();


        /*
        |--------------------------------------------------------------------------
        | Existing Passenger IDs
        |--------------------------------------------------------------------------
        */

        $existingPassengerIds = $booking->transactions()
            ->pluck('id')
            ->toArray();

        $submittedPassengerIds = [];


        /*
        |--------------------------------------------------------------------------
        | Update / Create Passengers
        |--------------------------------------------------------------------------
        */

        foreach ($request->passengers as $index => $passenger) {

            /*
             * Existing passenger
             */
            if (!empty($passenger['id'])) {

                $bookingTrans = BookingTrans::where('id', $passenger['id'])
                    ->where('bookid', $booking->id)
                    ->firstOrFail();

                $submittedPassengerIds[] = $bookingTrans->id;

            } else {

                /*
                 * New passenger
                 */
                $bookingTrans = new BookingTrans();

                $bookingTrans->bookid = $booking->id;
            }


            $bookingTrans->customername =
                $passenger['customername'];

            $bookingTrans->age =
                $passenger['age'];

            $bookingTrans->phonenumber =
                $passenger['phonenumber'] ?? null;

            $bookingTrans->adharcardnumber =
                $passenger['adharcardnumber'] ?? null;

            $bookingTrans->seatnumber =
                $passenger['seatnumber'] ?? null;


            /*
            |--------------------------------------------------------------------------
            | Aadhaar File
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile(
                "passengers.$index.adharcardpf"
            )) {

                $file = $request->file(
                    "passengers.$index.adharcardpf"
                );

                $filename = time()
                    . '_' . $index
                    . '_' . $file->getClientOriginalName();

                $file->move(
                    public_path('uploads/adharcard'),
                    $filename
                );

                /*
                 * Delete old file
                 */
                if (
                    !empty($bookingTrans->adharcardpf) &&
                    file_exists(
                        public_path(
                            'uploads/adharcard/' .
                            $bookingTrans->adharcardpf
                        )
                    )
                ) {
                    unlink(
                        public_path(
                            'uploads/adharcard/' .
                            $bookingTrans->adharcardpf
                        )
                    );
                }

                $bookingTrans->adharcardpf = $filename;
            }

            $bookingTrans->save();

            if (!in_array(
                $bookingTrans->id,
                $submittedPassengerIds
            )) {
                $submittedPassengerIds[] =
                    $bookingTrans->id;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Removed Passengers
        |--------------------------------------------------------------------------
        */

        $passengersToDelete = array_diff(
            $existingPassengerIds,
            $submittedPassengerIds
        );

        foreach ($passengersToDelete as $passengerId) {

            $passenger = BookingTrans::find($passengerId);

            if ($passenger) {

                if (
                    !empty($passenger->adharcardpf) &&
                    file_exists(
                        public_path(
                            'uploads/adharcard/' .
                            $passenger->adharcardpf
                        )
                    )
                ) {
                    unlink(
                        public_path(
                            'uploads/adharcard/' .
                            $passenger->adharcardpf
                        )
                    );
                }

                $passenger->delete();
            }
        }


        DB::commit();

        return redirect()
            ->route('bookings.list')
            ->with(
                'success',
                'Booking updated successfully.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with(
                'error',
                'Booking update failed: ' .
                $e->getMessage()
            );
    }
}
}
