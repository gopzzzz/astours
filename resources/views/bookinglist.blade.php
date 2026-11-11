@extends('layouts.mainlayout')

@section('content')

<style>
.booking-page {
    padding: 25px;
}

.booking-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
}

.booking-header h4 {
    margin: 0;
    font-size: 23px;
    font-weight: 700;
    color: #222;
}

.booking-header p {
    margin: 5px 0 0;
    color: #888;
    font-size: 13px;
}

.add-booking-btn {
    background: #0d6efd;
    color: #fff;
    border-radius: 8px;
    padding: 10px 17px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
}

.add-booking-btn:hover {
    background: #0b5ed7;
    color: #fff;
}

.booking-list-card {
    background: #fff;
    border: 1px solid #e8ebef;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,.04);
}

.booking-table-wrapper {
    overflow-x: auto;
}

.booking-table {
    width: 100%;
    min-width: 1100px;
    border-collapse: collapse;
}

.booking-table th {
    background: #f8f9fa;
    color: #777;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 15px 18px;
    border-bottom: 1px solid #e9ecef;
    white-space: nowrap;
}

.booking-table td {
    padding: 16px 18px;
    border-bottom: 1px solid #f0f1f3;
    vertical-align: middle;
    font-size: 13px;
    color: #444;
}

.booking-table tr:last-child td {
    border-bottom: 0;
}

.booking-id {
    background: #4475cf;
    color: #feffff;
    padding: 6px 9px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 12px;
}

.booking-confirm {
    background: #189338;
    color: #f7faf8;
    padding: 6px 9px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 12px;
}


.customer-name {
    font-weight: 700;
    color: #222;
}

.customer-phone {
    display: block;
    margin-top: 3px;
    color: #888;
    font-size: 12px;
}

.tour-name {
    font-weight: 600;
    color: #333;
}

.booking-date {
    white-space: nowrap;
    color: #666;
}

.person-count {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #f1f5f9;
    padding: 6px 10px;
    border-radius: 7px;
    font-weight: 600;
}

.booking-amount {
    font-weight: 700;
    color: #222;
}

.payment-badge {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
}

.payment-pending {
    background: #fff3cd;
    color: #856404;
}

.payment-partial {
    background: #cff4fc;
    color: #055160;
}

.payment-paid {
    background: #d1e7dd;
    color: #0f5132;
}

.action-btn {
    width: 34px;
    height: 34px;
    border-radius: 7px;
    border: 1px solid #e1e5e9;
    background: #fff;
    color: #555;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    margin-right: 4px;
}

.action-btn:hover {
    background: #f1f3f5;
    color: #0d6efd;
}

.delete-btn:hover {
    color: #dc3545;
}

.empty-booking {
    text-align: center;
    padding: 60px 20px;
    color: #888;
}

.empty-booking i {
    font-size: 42px;
    margin-bottom: 12px;
    color: #ccc;
}

@media(max-width:767px) {
    .booking-page {
        padding: 15px;
    }

    .booking-header {
        align-items: flex-start;
        gap: 15px;
        flex-direction: column;
    }
}
.booking-filter {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.booking-filter input {
    height: 40px;
    padding: 0 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
}

.booking-filter input[type="text"] {
    width: 240px;
}

.booking-filter input[type="date"] {
    width: 160px;
}

.booking-filter button,
.booking-filter a {
    height: 40px;
    padding: 0 16px;
    border-radius: 5px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.booking-filter button {
    border: 0;
    background: #222;
    color: #fff;
    cursor: pointer;
}

.booking-filter a {
    border: 1px solid #ddd;
    color: #333;
    background: #fff;
}

.booking-filter .btn-export {
    background: #198754;
    border-color: #198754;
    color: #fff;
}

@media (max-width: 768px) {
    .booking-filter {
        flex-direction: column;
        align-items: stretch;
    }

    .booking-filter input,
    .booking-filter input[type="text"],
    .booking-filter input[type="date"],
    .booking-filter button,
    .booking-filter a {
        width: 100%;
        box-sizing: border-box;
    }
}
.btn-export {
    height: 42px;
    display: inline-flex;
    align-items: center;
    padding: 0 18px;
    border-radius: 6px;
    background: #198754;
    color: #fff;
    text-decoration: none;
    font-size: 14px;
}

.btn-export:hover {
    background: #157347;
    color: #fff;
}
</style>


<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="booking-page">

                <div class="booking-header">

                    <div>
                        <h4>Bookings</h4>
                        <p>Manage all tour bookings and passenger details</p>
                    </div>

                    <a href="{{ route('bookings.index') }}"
                       class="add-booking-btn">
                        <i class="fa fa-plus me-1"></i>
                        New Booking
                    </a>

                </div>


                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                   <form method="GET" action="{{ route('bookings.list') }}" class="booking-filter">


                   <select name="tour_id" id="tour_id" class="form-select" required>
    <option value="">Select Tour</option>

    @foreach($tours as $tour)
        <option value="{{ $tour->id }}"
            {{ old('tour_id') == $tour->id ? 'selected' : '' }}>
            {{ $tour->tourname }} - (@if($tour->package_type==1) BUS @else TRAIN @endif)  -
            {{ \Carbon\Carbon::parse($tour->date)->format('d-m-Y') }}
        </option>
    @endforeach
</select>

    <input
        type="text"
        name="search"
        placeholder="Search customer name , phone number ..."
        value="{{ request('search') }}"
    >

    

    <input
        type="date"
        name="from_date"
        value="{{ request('from_date') }}"
    >

    <input
        type="date"
        name="to_date"
        value="{{ request('to_date') }}"
    >

    <button type="submit" class="btn-search">
        Search
    </button>

    <a href="{{ url('bookinglist') }}" class="btn-clear"> 
        Clear
    </a>

     <a href="{{ route('bookings.export', request()->query()) }}"
       class="btn-export">
        Export CSV
    </a>

     <a href="{{ route('bookings.passengerexport', request()->query()) }}"
       class="btn-export">
        Export Passenger Details
    </a>


</form>


                <div class="booking-list-card">

                    <div class="booking-table-wrapper">

                        <table class="booking-table">

                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Customer</th>
                                    <th>Tour</th>
                                    <th>Booking Date</th>
                                    <th>Persons</th>
                                    <th>Package Cost</th>
                                    
                                    <th>Addons</th>
                                    <th>Discount</th>
                                    <th>Advance</th>
                                    <th>Balance</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($bookings as $booking)

                                    <tr>

                                        <td>
                                             @if($booking->booking_status == 1)
                                            <span class="booking-confirm">
                                                #{{ $booking->id }}
                                            </span>
                                             @else 

                                              <span class="booking-id">
                                                #{{ $booking->id }}
                                            </span>


                                             @endif
                                        </td>

                                        <td>
                                            <div class="customer-name">
                                                {{ $booking->booking_personname }}
                                            </div>

                                            <span class="customer-phone">
                                                {{ $booking->phonenumber }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="tour-name">
                                                {{ $booking->tour->tourname ?? '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="booking-date">
                                                {{ \Carbon\Carbon::parse($booking->bookingdate)->format('d M Y') }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="person-count">
                                                <i class="fa fa-users"></i>
                                                {{ $booking->totalnumber }}
                                            </span>
                                        </td>

                                          <td>
                                            ₹ {{ number_format($booking->packagecost * $booking->totalnumber, 2) }}
                                        </td>

                                          

                                          <td>
                                            ₹ {{ number_format($booking->addonamount, 2) }}
                                        </td>

                                          <td>
                                            ₹ {{ number_format($booking->discount, 2) }}
                                        </td>

                                         <td>
                                            ₹ {{ number_format($booking->received_amount, 2) }}
                                        </td>

                                         <td>
                                            ₹ {{ number_format($booking->pending_amount, 2) }}
                                        </td>


                                        <td>
                                            <span class="booking-amount">
                                                ₹ {{ number_format($booking->totalamount, 2) }}
                                            </span>
                                        </td>

                                     
                                      

                                        <td>

                                            <a href="{{ route('bookings.show', $booking->id) }}"
                                               class="action-btn"
                                               title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                           <a href="{{ route('bookings.edit', $booking->id) }}"
   class="action-btn"
   title="Edit">
    <i class="fa fa-edit"></i>
</a>
                                            


                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="10">

                                            <div class="empty-booking">
                                                <i class="fa fa-calendar"></i>
                                                <h5>No Bookings Found</h5>
                                                <p>Create your first tour booking.</p>
                                            </div>

                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                        <div class="pagination-wrapper">
    {{ $bookings->links() }}
</div>

                    </div>

                </div>

            </div>
        </div>
    </section>

</div>
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>

@endsection