@extends('layouts.weblayout')

@section('content')

<style>
    /* ================================
       BOOKING FORM
    ================================= */

    .booking-page {
        max-width: 1180px;
        margin: 30px auto;
        padding: 0 15px;
        font-family: Arial, sans-serif;
        color: #fc6a3a;
    }

    .booking-wrapper {
        background: #f8fafc;
        border-radius: 20px;
        overflow: hidden;
    }

    /* Header */
    .booking-header {
        background: linear-gradient(135deg, #fc6a3a, #fc6a3a);
        padding: 28px 30px;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .booking-header-left h2 {
        margin: 0 0 6px;
        font-size: 25px;
        font-weight: 700;
    }

    .booking-header-left p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .booking-header-icon {
        width: 55px;
        height: 55px;
        border-radius: 14px;
        background: rgba(255,255,255,.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
    }


    /* Sections */
    .booking-section {
        background: #fff;
        margin-top: 14px;
        padding: 25px 28px;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 22px;
    }

    .section-number {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: #ecfdf5;
        color: #fc6a3a;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
    }

    .section-heading h5 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #fc6a3a;
    }

    .section-heading p {
        margin: 2px 0 0;
        font-size: 12px;
        color: #9ca3af;
    }


    /* Form fields */
    .form-field {
        margin-bottom: 18px;
    }

    .form-field label {
        display: block;
        margin-bottom: 7px;
        font-size: 13px;
        font-weight: 600;
        color: #fc6a3a;
    }

    .form-field label span {
        color: #dc2626;
    }

    .form-control,
    .form-select {
        width: 100%;
        min-height: 46px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 10px 13px;
        font-size: 14px;
        color: #fc6a3a;
        background: #fff;
        outline: none;
        transition: .2s ease;
        box-sizing: border-box;
    }

    textarea.form-control {
        min-height: 90px;
        resize: vertical;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #fc6a3a;
        box-shadow: 0 0 0 3px rgba(22,163,74,.10);
    }


    /* Passenger section header */
    .passenger-section-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .passenger-section-top .section-heading {
        margin-bottom: 0;
    }

    .add-passenger-btn {
        border: 0;
        background: #fc6a3a;
        color: #fff;
        height: 42px;
        padding: 0 17px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: .2s ease;
    }

    .add-passenger-btn:hover {
        background: #fc6a3a;
        transform: translateY(-1px);
    }


    /* Passenger card */
    .passenger-card {
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        margin-bottom: 15px;
        overflow: hidden;
        background: #fff;
    }

    .passenger-card-header {
        min-height: 54px;
        padding: 0 18px;
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .passenger-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .passenger-count {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        background: #fc6a3a;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
    }

    .passenger-name-title {
        font-size: 14px;
        font-weight: 700;
        color: #1f2937;
    }

    .passenger-card-body {
        padding: 20px;
    }


    /* Seat badge */
    .seat-badge-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .seat-badge-label {
        color: #9ca3af;
        font-size: 11px;
    }

    .seat-badge {
        min-width: 55px;
        height: 32px;
        padding: 0 10px;
        border-radius: 8px;
        background: #ecfdf5;
        color: #fc6a3a;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-size: 13px;
        font-weight: 700;
    }


    /* Remove */
    .remove-passenger-btn {
        width: 32px;
        height: 32px;
        border: 0;
        border-radius: 8px;
        background: #fef2f2;
        color: #dc2626;
        cursor: pointer;
        transition: .2s;
    }

    .remove-passenger-btn:hover {
        background: #fee2e2;
    }


    /* Input with icon */
    .input-wrap {
        position: relative;
    }

    .input-wrap .field-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 13px;
    }

    .input-wrap .form-control {
        padding-left: 36px;
    }


    /* Payment */
    .payment-summary {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        padding: 18px;
        margin-top: 8px;
    }

    .payment-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        font-size: 14px;
    }

    .payment-row span {
        color: #6b7280;
    }

    .payment-row strong {
        color: #111827;
    }

    .payment-total {
        border-top: 1px solid #e5e7eb;
        margin-top: 8px;
        padding-top: 15px;
        font-size: 18px;
    }

    .payment-total strong {
        color: #fc6a3a;
    }


    /* Amount prefix */
    .amount-group {
        display: flex;
    }

    .amount-prefix {
        height: 46px;
        padding: 0 14px;
        display: flex;
        align-items: center;
        background: #f3f4f6;
        border: 1px solid #d1d5db;
        border-right: 0;
        border-radius: 10px 0 0 10px;
        color: #4b5563;
        font-weight: 600;
    }

    .amount-group .form-control {
        border-radius: 0 10px 10px 0;
    }


    /* Footer */
    .booking-footer {
        margin-top: 15px;
        padding: 20px 25px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .cancel-btn,
    .save-btn {
        min-height: 45px;
        padding: 0 22px;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 0;
        cursor: pointer;
    }

    .cancel-btn {
        background: #f3f4f6;
        color: #374151;
    }

    .save-btn {
        background: #fc6a3a;
        color: #fff;
    }

    .save-btn:hover {
        background: #fc6a3a;
    }


    /* Empty passenger */
    .empty-passenger {
        padding: 30px;
        text-align: center;
        color: #9ca3af;
        border: 1px dashed #d1d5db;
        border-radius: 12px;
        margin-bottom: 15px;
    }


    /* Responsive */
    @media(max-width: 768px) {

        .booking-page {
            margin: 15px auto;
        }

        .booking-header {
            padding: 22px;
        }

        .booking-section {
            padding: 20px;
        }

        .passenger-section-top {
            align-items: flex-start;
            flex-direction: column;
        }

        .add-passenger-btn {
            width: 100%;
        }

        .booking-footer {
            flex-direction: column-reverse;
        }

        .cancel-btn,
        .save-btn {
            width: 100%;
        }
    }
</style>


<div class="booking-page">

    <form
        action="{{ route('success-enquiry') }}"
        method="POST"
        enctype="multipart/form-data"
        id="bookingForm"
    >

        @csrf


        <!-- =========================================
             HEADER
        ========================================== -->

        <div class="booking-wrapper">

            <div class="booking-header">

                <div class="booking-header-left">

                    <h2>Send Enquiry</h2>

                    <!-- <p>
                        Add customer, passenger and payment details
                    </p> -->

                </div>

                <div class="booking-header-icon">
                    <i class="fa fa-ticket"></i>
                </div>

            </div>



            <!-- =========================================
                 TOUR DETAILS
            ========================================== -->

            <div class="booking-section">

                <div class="section-heading">

                    <div class="section-number">
                        02
                    </div>

                    <div>
                        <h5>Tour Details</h5>
                        <p>Select tour and booking information</p>
                    </div>

                </div>


                <div class="row">

                    <!-- Tour -->
                    


                    <!-- Total number -->
                    <div class="col-md-4">

                        <div class="form-field">

                            <label>
                                Total Number <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="totalnumber"
                                id="totalnumber"
                                class="form-control"
                                min="1"
                                value="{{ $totalCount }}"
                                placeholder="Number of persons"
                                required  readonly
                            >

                        </div>

                    </div>


                    <!-- Booking date -->
                    <div class="col-md-4">

                        <div class="form-field">

                            <label>
                                Booking Date <span>*</span>
                            </label>

                            <input type="hidden" name="tour_id" value="{{$tour->id}}">

                            <input
                                type="date"
                                name="bookingdate"
                                class="form-control"
                                value="{{ old('bookingdate', date('Y-m-d')) }}"
                                required
                            >

                        </div>

                    </div>


                    <!-- Pickup -->
                    <div class="col-md-6">

                        <div class="form-field">

                            <label>
                                Pickup Location <span>*</span>
                            </label>

                            <select
                                name="pickuplocation"
                                id="pickup_location"
                                class="form-select"
                                required
                            >
                                @foreach($locations as $location)

                <option
                    value="{{ $location }}"
                    {{ old('pickuplocation') == $location ? 'selected' : '' }}
                >
                    {{ $location }}
                </option>

            @endforeach

                            </select>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =========================================
                 PASSENGERS
            ========================================== -->

            <div class="booking-section">

                <div class="passenger-section-top">

                    <div class="section-heading">

                        <div class="section-number">
                            03
                        </div>

                        <div>
                            <h5>Passenger Details</h5>
                            <p>
                                Add details for every passenger
                            </p>
                        </div>

                    </div>


                    <!-- <button
                        type="button"
                        class="add-passenger-btn"
                        id="addPassenger"
                    >
                        <i class="fa fa-plus"></i>
                        &nbsp; Add Passenger
                    </button> -->

                </div>


                <input
                    type="hidden"
                    id="rowcout"
                >


                <div id="passengerContainer">

                    @php

                        $oldPassengers = old('passengers');

                        if (!$oldPassengers) {

                            $oldPassengers = [

                                [
                                    'customername' => '',
                                    'age' => '',
                                    'phonenumber' => '',
                                    'adharcardnumber' => '',
                                    'seatnumber' => ''
                                ]

                            ];

                        }

                    @endphp


                    @foreach($seats as $index => $passenger)

                        <div class="passenger-card">

                            <!-- Passenger header -->

                            <div class="passenger-card-header">

                                <div class="passenger-info">

                                    <div class="passenger-count">
                                        {{ $index + 1 }}
                                    </div>

                                    <div class="passenger-name-title">
                                        Passenger {{ $index + 1 }}
                                    </div>

                                </div>


                                <div class="seat-badge-wrapper">

                                    <span class="seat-badge-label">
                                        Seat
                                    </span>

                                    <span class="seat-badge">
                                        <span class="seat-preview">
                                            {{ $passenger }}
                                        </span>
                                    </span>


                                    @if($index > 0)

                                        <button
                                            type="button"
                                            class="remove-passenger-btn"
                                            title="Remove passenger"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    @endif

                                </div>

                            </div>


                            <!-- Passenger body -->

                            <div class="passenger-card-body">

                                <div class="row">

                                    <!-- Customer Name -->

                                    <div class="col-md-4">

                                        <div class="form-field">

                                            <label>
                                                Passenger Name <span>*</span>
                                            </label>

                                            <input
                                                type="text"
                                                name="passengers[{{ $index }}][customername]"
                                                class="form-control"
                                                value="{{ $passenger['customername'] ?? '' }}"
                                                placeholder="Enter passenger name"
                                                required
                                            >

                                        </div>

                                    </div>


                                    <!-- Age -->

                                    <div class="col-md-2">

                                        <div class="form-field">

                                            <label>
                                                Age <span>*</span>
                                            </label>

                                            <input
                                                type="number"
                                                name="passengers[{{ $index }}][age]"
                                                class="form-control"
                                                value="{{ $passenger['age'] ?? '' }}"
                                                min="1"
                                                max="120"
                                                placeholder="Age"
                                                required
                                            >

                                        </div>

                                    </div>


                                    <!-- Phone -->

                                    <div class="col-md-3">

                                        <div class="form-field">

                                            <label>
                                                Phone Number
                                            </label>

                                            <input
                                                type="text"
                                                name="passengers[{{ $index }}][phonenumber]"
                                                class="form-control"
                                                value="{{ $passenger['phonenumber'] ?? '' }}"
                                                placeholder="Phone number"
                                            >

                                        </div>

                                    </div>


                                    <!-- Seat -->

                                     <input
                                                type="hidden"
                                                name="passengers[{{ $index }}][seatnumber]"
                                                class="form-control seat-number"
                                                value="  {{ $passenger }}"
                                                placeholder="Seat number"
                                            >


                                   


                                    <!-- Aadhaar File -->

                                  

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            
            <!-- =========================================
                 CUSTOMER DETAILS
            ========================================== -->

            <div class="booking-section">

                <div class="section-heading">

                    <div class="section-number">
                        01
                    </div>

                    <div>
                        <h5>Emergency Contact Details</h5>
                        <!-- <p>Primary booking contact information</p> -->
                    </div>

                </div>


                <div class="row">

                
                    <!-- Phone -->
                    <div class="col-md-4">

                        <div class="form-field">

                            <label>
                                Emergency Contact Number <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="phonenumber"
                                class="form-control"
                                value="{{ old('phonenumber') }}"
                                placeholder="Enter phone number"
                                required
                            >

                        </div>

                    </div>

                    <!-- Name -->
                    <div class="col-md-4">

                        <div class="form-field">

                            <label>
                                Person Relationship <span>*</span>
                            </label>

                            <input
                                type="text"
                                name="booking_personname"
                                class="form-control"
                                value="{{ old('booking_personname') }}"
                                placeholder="Enter  Person Relationship "
                                required
                            >

                        </div>

                    </div>






                   

                </div>

            </div>



            <!-- =========================================
                 PAYMENT DETAILS
            ========================================== -->

            <div class="booking-section">

                <div class="section-heading">

                    <div class="section-number">
                        04
                    </div>

                    <div>
                        <h5>Payment Details</h5>
                        <p>Enter payment and amount information</p>
                    </div>

                </div>


                <div class="row">

                    <!-- Total Amount -->

                    <div class="col-md-4">

                        <div class="form-field">

                            <label>
                                Total Amount <span>*</span>
                            </label>

                            <div class="amount-group">

                                <span class="amount-prefix">
                                    ₹
                                </span>

                                <input
                                    type="number"
                                    name="totalamount"
                                    id="totalamount"
                                    class="form-control"
                                    step="0.01"
                                    min="0"
                                    value="{{ $totalCount * $tour->amount }}"
                                    placeholder="0.00"
                                    required
                                >

                            </div>

                        </div>

                    </div>



                    

                </div>

            </div>


            <!-- =========================================
                 FOOTER
            ========================================== -->

            <div class="booking-footer">

                <a
                    href="{{ url('booknow/'.$tour->slug) }}"
                    class="cancel-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="save-btn"
                >
                    <i class="fa fa-check"></i>
                    &nbsp; Enquiry Now
                </button>

            </div>

        </div>

    </form>

</div>


@endsection