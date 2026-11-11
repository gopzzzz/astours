@extends('layouts.mainlayout')

@section('content')

<style>
.booking-show-page {
    padding: 25px;
}

.booking-show-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
}

.booking-show-header h4 {
    margin: 0;
    font-size: 23px;
    font-weight: 700;
    color: #222;
}

.booking-show-header p {
    margin: 5px 0 0;
    color: #888;
    font-size: 13px;
}

.back-btn {
    border: 1px solid #ddd;
    background: #fff;
    color: #555;
    padding: 9px 15px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 13px;
}

.back-btn:hover {
    background: #f5f5f5;
    color: #0d6efd;
}

.details-card {
    background: #fff;
    border: 1px solid #e8ebef;
    border-radius: 15px;
    margin-bottom: 20px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,.04);
}

.details-card-header {
    padding: 17px 22px;
    background: #f8f9fa;
    border-bottom: 1px solid #eee;
}

.details-card-header h6 {
    margin: 0;
    font-size: 15px;
    font-weight: 700;
    color: #333;
}

.details-card-body {
    padding: 22px;
}

.detail-item {
    margin-bottom: 18px;
}

.detail-label {
    display: block;
    font-size: 11px;
    color: #999;
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 5px;
}

.detail-value {
    font-size: 14px;
    color: #333;
    font-weight: 600;
}

.detail-value.normal {
    font-weight: 400;
}

.payment-status {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
}

.status-pending {
    background: #fff3cd;
    color: #856404;
}

.status-partial {
    background: #cff4fc;
    color: #055160;
}

.status-paid {
    background: #d1e7dd;
    color: #0f5132;
}

.amount-box {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
}

.amount-box small {
    display: block;
    color: #888;
    font-size: 11px;
    margin-bottom: 5px;
}

.amount-box strong {
    font-size: 18px;
    color: #222;
}

.passenger-table-wrapper {
    overflow-x: auto;
}

.passenger-table {
    width: 100%;
    min-width: 850px;
    border-collapse: collapse;
}

.passenger-table th {
    background: #f8f9fa;
    color: #777;
    font-size: 11px;
    text-transform: uppercase;
    padding: 13px 15px;
    border-bottom: 1px solid #eee;
}

.passenger-table td {
    padding: 14px 15px;
    border-bottom: 1px solid #f0f1f3;
    font-size: 13px;
    color: #444;
}

.passenger-table tr:last-child td {
    border-bottom: 0;
}

.passenger-number {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #eef4ff;
    color: #0d6efd;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}

.seat-badge {
    background: #f1f5f9;
    color: #333;
    padding: 6px 10px;
    border-radius: 6px;
    font-weight: 700;
}

.view-file-btn {
    display: inline-block;
    padding: 6px 10px;
    background: #eef4ff;
    color: #0d6efd;
    border-radius: 6px;
    text-decoration: none;
    font-size: 11px;
    font-weight: 600;
}

.view-file-btn:hover {
    background: #0d6efd;
    color: #fff;
}

@media(max-width:767px) {

    .booking-show-page {
        padding: 15px;
    }

    .booking-show-header {
        align-items: flex-start;
        gap: 15px;
        flex-direction: column;
    }

    .details-card-body {
        padding: 16px;
    }
}
</style>


<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="booking-show-page">

                <!-- Header -->
                <div class="booking-show-header">

                    <div>
                        <h4>Booking #{{ $booking->id }}</h4>
                        <p>View complete booking and passenger details</p>
                    </div>

                    <a href="{{ route('bookings.list') }}"
                       class="back-btn" >
                      
                       <i class="fa fa-arrow-left me-1"></i>
                        Back to Bookings
                    </a>

                  

                </div>


                <!-- CUSTOMER DETAILS -->
                <div class="details-card">

                    <div class="details-card-header">
                        <h6>
                            <i class="fa fa-user me-2"></i>
                            Customer Details
                        </h6>
                    </div>

                    <div class="details-card-body">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="detail-item">
                                    <span class="detail-label">
                                        Booking Person
                                    </span>

                                    <div class="detail-value">
                                        {{ $booking->booking_personname }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-item">
                                    <span class="detail-label">
                                        Phone Number
                                    </span>

                                    <div class="detail-value">
                                        {{ $booking->phonenumber }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-item">
                                    <span class="detail-label">
                                        Email
                                    </span>

                                    <div class="detail-value">
                                        {{ $booking->mail ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="detail-item mb-0">
                                    <span class="detail-label">
                                        Address
                                    </span>

                                    <div class="detail-value normal">
                                        {{ $booking->address ?? '-' }}
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


                <!-- TOUR DETAILS -->
                <div class="details-card">

                    <div class="details-card-header">
                        <h6>
                            <i class="fa fa-map-marker me-2"></i>
                            Tour Details
                        </h6>
                    </div>

                    <div class="details-card-body">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="detail-item">
                                    <span class="detail-label">
                                        Tour
                                    </span>

                                    <div class="detail-value">
                                        {{ $booking->tour->tourname ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-item">
                                    <span class="detail-label">
                                        Booking Date
                                    </span>

                                    <div class="detail-value">
                                        {{ \Carbon\Carbon::parse($booking->bookingdate)->format('d M Y') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="detail-item">
                                    <span class="detail-label">
                                        Total Passengers
                                    </span>

                                    <div class="detail-value">
                                        {{ $booking->totalnumber }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-item mb-0">
                                    <span class="detail-label">
                                        Pickup Location
                                    </span>

                                    <div class="detail-value">
                                        {{ $booking->pickuplocation ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-item mb-0">
                                    <span class="detail-label">
                                        Customer ID
                                    </span>

                                    <div class="detail-value">
                                        {{ $booking->cus_id ?? '-' }}
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


                <!-- PASSENGER DETAILS -->
                <div class="details-card">

                    <div class="details-card-header">
                        <h6>
                            <i class="fa fa-users me-2"></i>
                            Passenger Details
                        </h6>
                    </div>

                    <div class="passenger-table-wrapper">

                        <table class="passenger-table">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Age</th>
                                    <th>Phone</th>
                                    <th>Aadhaar Number</th>
                                    <th>Aadhaar</th>
                                    <th>Seat</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($booking->transactions as $index => $passenger)

                                    <tr>

                                        <td>
                                            <span class="passenger-number">
                                                {{ $index + 1 }}
                                            </span>
                                        </td>

                                        <td>
                                            <strong>
                                                {{ $passenger->customername }}
                                            </strong>
                                        </td>

                                        <td>
                                            {{ $passenger->age }}
                                        </td>

                                        <td>
                                            {{ $passenger->phonenumber ?? '-' }}
                                        </td>

                                        <td>
                                            {{ $passenger->adharcardnumber ?? '-' }}
                                        </td>

                                        <td>

                                            @if($passenger->adharcardpf)

                                                <a href="{{ asset('uploads/adharcard/' . $passenger->adharcardpf) }}"
                                                   target="_blank"
                                                   class="view-file-btn">
                                                    <i class="fa fa-file me-1"></i>
                                                    View
                                                </a>

                                            @else
                                                -
                                            @endif

                                        </td>

                                        <td>

                                            @if($passenger->seatnumber)

                                                <span class="seat-badge">
                                                    {{ $passenger->seatnumber }}
                                                </span>

                                            @else
                                                -
                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7"
                                            class="text-center py-4">
                                            No passenger details found.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- PAYMENT DETAILS -->
                <div class="details-card">

                    <div class="details-card-header">
                        <h6>
                            <i class="fa fa-credit-card me-2"></i>
                            Payment Details
                        </h6>
                    </div>

                    <div class="details-card-body">

                        <div class="row g-3">

                            <div class="col-md-3">
                                <div class="amount-box">
                                    <small>Total Amount</small>
                                    <strong>
                                        ₹ {{ number_format($booking->totalamount, 2) }}
                                    </strong>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="amount-box">
                                    <small>Received Amount</small>
                                    <strong>
                                        ₹ {{ number_format($booking->received_amount, 2) }}
                                    </strong>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="amount-box">
                                    <small>Pending Amount</small>
                                    <strong>
                                        ₹ {{ number_format($booking->pending_amount, 2) }}
                                    </strong>
                                </div>
                            </div>

                            <div class="col-md-3">

                                <div class="amount-box">

                                    <small>Payment Status</small>

                                    @if($booking->payment_status == 0)

                                        <span class="payment-status status-pending">
                                            Pending
                                        </span>

                                    @elseif($booking->payment_status == 1)

                                        <span class="payment-status status-partial">
                                            Partially Paid
                                        </span>

                                    @else

                                        <span class="payment-status status-paid">
                                            Paid
                                        </span>

                                    @endif

                                </div>

                            </div>

                            <div class="col-md-12 mt-3">

                                <span class="detail-label">
                                    Payment Mode
                                </span>

                                <div class="detail-value">

                                    @if($booking->payment_mode == 1)
                                        Cash
                                    @elseif($booking->payment_mode == 2)
                                        Bank Transfer
                                    @elseif($booking->payment_mode == 3)
                                        UPI
                                    @else
                                        -
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

</div>
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>

@endsection