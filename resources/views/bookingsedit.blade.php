@extends('layouts.mainlayout')

@section('content')

<style>
.booking-edit-card {
    background: #fff;
    border: 1px solid #e7eaf0;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0,0,0,.04);
}

.booking-edit-header {
    padding: 24px 28px;
    background: #f8f9fa;
    border-bottom: 1px solid #eee;
}

.booking-edit-header h4 {
    margin: 0;
    font-weight: 700;
    color: #222;
}

.booking-edit-header p {
    margin: 5px 0 0;
    color: #888;
    font-size: 13px;
}

.booking-section {
    padding: 25px 28px;
    border-bottom: 1px solid #eee;
}

.section-title {
    font-size: 16px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
}

.booking-section label {
    display: block;
    margin-bottom: 7px;
    font-size: 13px;
    font-weight: 600;
    color: #444;
}

.booking-section label span {
    color: #dc3545;
}

.booking-section .form-control,
.booking-section .form-select {
    min-height: 45px;
    border-radius: 8px;
    border: 1px solid #dfe3e8;
    font-size: 14px;
}

.booking-section textarea {
    min-height: 90px !important;
}

.passenger-section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.passenger-card {
    border: 1px solid #e2e6ea;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 15px;
    background: #fafbfc;
}

.passenger-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.passenger-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.passenger-number {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #eaf2ff;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}

.remove-passenger-btn {
    border: 0;
    background: #fff0f0;
    color: #dc3545;
    width: 35px;
    height: 35px;
    border-radius: 7px;
}

.add-passenger-btn {
    background: #0d6efd;
    color: #fff;
    border: 0;
    border-radius: 8px;
    padding: 9px 15px;
    font-size: 13px;
    font-weight: 600;
}

.current-file {
    margin-top: 6px;
}

.current-file a {
    font-size: 12px;
    color: #0d6efd;
}

.booking-footer {
    padding: 20px 28px;
    background: #f8f9fa;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.booking-save-btn {
    background: #0d6efd;
    color: #fff;
    border: 0;
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: 600;
}

.booking-cancel-btn {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px 20px;
}

@media(max-width:767px) {
    .booking-section {
        padding: 20px 16px;
    }

    .booking-edit-header {
        padding: 20px 16px;
    }

    .booking-footer {
        padding: 16px;
    }

    .passenger-section-header {
        align-items: flex-start;
        flex-direction: column;
        gap: 12px;
    }
}

.addon-card {
    display: block;
    cursor: pointer;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 16px;
    background: #fff;
    transition: all 0.25s ease;
    margin: 0;
}

.addon-card:hover {
    border-color: #2563eb;
    box-shadow: 0 5px 16px rgba(37, 99, 235, 0.10);
    transform: translateY(-2px);
}

.addon-checkbox {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}

.addon-content {
    display: flex;
    align-items: center;
    gap: 14px;
}

.addon-icon {
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eff6ff;
    color: #2563eb;
    border-radius: 12px;
    font-size: 21px;
}

.addon-details {
    flex: 1;
}

.addon-details h6 {
    margin: 0 0 5px;
    font-weight: 700;
    color: #1e293b;
}

.addon-details small {
    color: #64748b;
    font-size: 12px;
}

.addon-price {
    margin-top: 7px;
    font-weight: 700;
    color: #2563eb;
}

.addon-check {
    color: #cbd5e1;
    font-size: 21px;
}

.addon-checkbox:checked + .addon-content {
    color: #1d4ed8;
}

.addon-checkbox:checked + .addon-content .addon-icon {
    background: #dbeafe;
}

.addon-checkbox:checked + .addon-content .addon-check {
    color: #2563eb;
}

.addon-card:has(.addon-checkbox:checked) {
    border: 2px solid #2563eb;
    background: #f8fbff;
    padding: 15px;
}

</style>


<div class="content-wrapper">

    <section class="content">

        <div class="container-fluid py-4">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <div class="booking-edit-card">

                <div class="booking-edit-header">
                    <h4>Edit Booking #{{ $booking->id }}</h4>
                    <p>Update customer, tour, passenger and payment details</p>
                </div>


                <form action="{{ route('bookings.update', $booking->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <!-- CUSTOMER -->
                    <!-- <div class="booking-section">

                        <h6 class="section-title">
                            Customer Details
                        </h6>

                        <div class="row g-3">

                            <div class="col-md-4">
                                <label>Booking Person Name <span>*</span></label>

                                <input type="text"
                                       name="booking_personname"
                                       class="form-control"
                                       value="{{ old('booking_personname', $booking->booking_personname) }}"
                                       required>
                            </div>

                            <div class="col-md-4">
                                <label>Phone Number <span>*</span></label>

                                <input type="text"
                                       name="phonenumber"
                                       class="form-control"
                                       value="{{ old('phonenumber', $booking->phonenumber) }}"
                                       required>
                            </div>

                            <div class="col-md-4">
                                <label>Email</label>

                                <input type="email"
                                       name="mail"
                                       class="form-control"
                                       value="{{ old('mail', $booking->mail) }}">
                            </div>

                            <div class="col-md-12">
                                <label>Address</label>

                                <textarea name="address"
                                          class="form-control">{{ old('address', $booking->address) }}</textarea>
                            </div>

                        </div>

                    </div> -->


                    <!-- TOUR -->
                    <div class="booking-section">

                        <h6 class="section-title">
                            Tour Details
                        </h6>

                        <div class="row g-3">

                            <div class="col-md-4">

                                <label>Tour <span>*</span></label>

                                <select name="tour_id" id="tour_id"
                                        class="form-select"
                                        required>

                                    <option value="{{$tours->id}}">
                                       {{$tours->tourname}} -  {{ \Carbon\Carbon::parse($tours->date)->format('d-m-Y') }}
                                    </option>


                                </select>

                            </div>


                            <div class="col-md-4">

                                <label>Total Number <span>*</span></label>

                                <input type="number"
                                       name="totalnumber"
                                       id="number_of_seats"
                                       class="form-control"
                                       min="1"
                                       value="{{ old('totalnumber', $booking->totalnumber) }}"
                                       required>

                            </div>


                            <div class="col-md-4">

                                <label>Booking Date <span>*</span></label>

                                <input type="date"
                                       name="bookingdate"
                                       class="form-control"
                                       value="{{ old('bookingdate', $booking->bookingdate) }}"
                                       required>

                            </div>


                            <div class="col-md-6">

                                <label>Pickup Location</label>

                                <select name="pickuplocation" class="form-control">
    <option value="">Select Pickup Location</option>

    @foreach($pickupLocations as $location)
        <option value="{{ $location }}"
            {{ old('pickuplocation', $booking->pickuplocation) == $location ? 'selected' : '' }}>
            {{ $location }}
        </option>
    @endforeach
</select>

                            </div>


                            <!-- <div class="col-md-6">

                                <label>Customer ID</label>

                                <input type="text"
                                       name="cus_id"
                                       class="form-control"
                                       value="{{ old('cus_id', $booking->cus_id) }}">

                            </div> -->

                        </div>

                    </div>


                    <!-- PASSENGERS -->
                    <div class="booking-section">

                       
<div class="passenger-section-header">
    <div>
        <h6 class="section-title mb-1">
            Passenger Details
        </h6>

        <small class="text-muted">
            Add, edit or remove passengers.
        </small>
    </div>

    <div class="d-flex gap-2 flex-wrap">
       <a href="@if($tours->package_type == 1) {{url('booknow/'.$tours->slug)}} @else # @endif" target="_blank"> <button type="button"
                class="btn btn-outline-primary"
                id="checkSeatNumber">
            <i class="fa fa-check-circle"></i>
            Check Seat Number
        </button></a>

        <button type="button"
                class="add-passenger-btn"
                id="addPassenger">
            <i class="fa fa-plus"></i>
            Add Passenger
        </button>
    </div>
</div>


                        <input type="hidden" id="rowcout">


                        <div id="passengerContainer">

                            @php
                                $passengers = old(
                                    'passengers',
                                    $booking->transactions->map(function ($passenger) {
                                        return [
                                            'id' => $passenger->id,
                                            'customername' => $passenger->customername,
                                            'age' => $passenger->age,
                                            'phonenumber' => $passenger->phonenumber,
                                            'adharcardnumber' => $passenger->adharcardnumber,
                                            'adharcardpf' => $passenger->adharcardpf,
                                            'seatnumber' => $passenger->seatnumber,
                                        ];
                                    })->toArray()
                                );
                            @endphp


                            @foreach($passengers as $index => $passenger)

                                <div class="passenger-card">

                                    <input type="hidden"
                                           name="passengers[{{ $index }}][id]"
                                           value="{{ $passenger['id'] ?? '' }}">


                                    <div class="passenger-card-header">

                                        <div class="passenger-title">

                                            <span class="passenger-number">
                                                {{ $index + 1 }}
                                            </span>

                                            <strong>
                                                Passenger {{ $index + 1 }}
                                            </strong>

                                        </div>


                                        @if($index > 0)

                                            <button type="button"
                                                    class="remove-passenger-btn">

                                                <i class="fa fa-trash"></i>

                                            </button>

                                        @endif

                                    </div>


                                    <div class="row g-3">

                                        <div class="col-md-4">

                                            <label>
                                                Customer Name <span>*</span>
                                            </label>

                                            <input type="text"
                                                   name="passengers[{{ $index }}][customername]"
                                                   class="form-control"
                                                   value="{{ $passenger['customername'] ?? '' }}"
                                                   required>

                                        </div>


                                        <div class="col-md-4">

                                            <label>
                                                Age <span>*</span>
                                            </label>

                                            <input type="number"
                                                   name="passengers[{{ $index }}][age]"
                                                   class="form-control"
                                                   value="{{ $passenger['age'] ?? '' }}"
                                                   min="1"
                                                   required>

                                        </div>


                                        <div class="col-md-4">

                                            <label>
                                                Phone Number
                                            </label>

                                            <input type="text"
                                                   name="passengers[{{ $index }}][phonenumber]"
                                                   class="form-control"
                                                   value="{{ $passenger['phonenumber'] ?? '' }}">

                                        </div>


                                        <div class="col-md-4">

                                            <label>
                                                Aadhaar Card Number
                                            </label>

                                            <input type="text"
                                                   name="passengers[{{ $index }}][adharcardnumber]"
                                                   class="form-control"
                                                   value="{{ $passenger['adharcardnumber'] ?? '' }}">

                                        </div>


                                        <div class="col-md-4">

                                            <label>
                                                Aadhaar Card
                                            </label>

                                            <input type="file"
                                                   name="passengers[{{ $index }}][adharcardpf]"
                                                   class="form-control">


                                            @if(!empty($passenger['adharcardpf']))

                                                <div class="current-file">

                                                    <a href="{{ asset('uploads/adharcard/' . $passenger['adharcardpf']) }}"
                                                       target="_blank">

                                                        <i class="fa fa-file"></i>
                                                        Current Aadhaar

                                                    </a>

                                                </div>

                                            @endif

                                        </div>


                                        <div class="col-md-4">

                                            <label>
                                                Seat Number
                                            </label>

                                            <input type="text"
       name="passengers[{{ $index }}][seatnumber]"
       class="form-control seat-number"
       value="{{ $passenger['seatnumber'] ?? '' }}"
       placeholder="Enter seat number">

<small class="seat-error text-danger" style="display:none;"></small>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>


                    <!-- PAYMENT -->
                    <div class="booking-section">

                        <h6 class="section-title">
                            Payment Details
                        </h6>

                         
                        
<div class="col-md-12 mt-3">
    <h6 class="fw-bold mb-3">
        <i class="fa fa-star text-warning me-2"></i>
        Optional Add-ons
    </h6>

    <div class="row g-3">

@php
    $selectedAddons = array_filter(
        explode(',', $booking->addons ?? '')
    );
@endphp

@foreach($addons as $adds)
    <div class="col-md-6">
        <label class="addon-card w-100" for="addon_{{ $adds->id }}">

            <input type="checkbox"
                   class="addon-checkbox"
                   name="addons[]"
                   id="addon_{{ $adds->id }}"
                   value="{{ $adds->id }}"
                   data-price="{{ $adds->amount }}"
                   {{ in_array((string) $adds->id, $selectedAddons, true) ? 'checked' : '' }}>

            <div class="addon-content">
                <div class="addon-icon">
                    <i class="fa fa-plus-circle"></i>
                </div>

                <div class="addon-details">
                    <h6>{{ $adds->addon }}</h6>
                    <div class="addon-price">
                        + ₹{{ number_format($adds->amount, 2) }}
                    </div>
                </div>

                <i class="fa fa-check-circle addon-check"></i>
            </div>
        </label>
    </div>
@endforeach

      

    </div>
</div>



                        <div class="row g-3">

                            <div class="col-md-4">

                            <input type="hidden" id="tour_price" value="{{$tours->amount}}">

                                <label>Total Amount <span>*</span></label>

                                <div class="input-group">

                                    <span class="input-group-text">₹</span>

                                    <input type="number"
                                           name="totalamount"
                                           id="totalamount"
                                           class="form-control"
                                           step="0.01"
                                           value="{{ old('totalamount', $booking->totalamount) }}"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <label>Payment Status <span>*</span></label>

                                <select name="payment_status"
                                        class="form-select"
                                        required>

                                    <option value="0"
                                        {{ old('payment_status', $booking->payment_status) == 0 ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="1"
                                        {{ old('payment_status', $booking->payment_status) == 1 ? 'selected' : '' }}>
                                        Partially Paid
                                    </option>

                                    <option value="2"
                                        {{ old('payment_status', $booking->payment_status) == 2 ? 'selected' : '' }}>
                                        Paid
                                    </option>

                                </select>

                            </div>


                            <div class="col-md-4">

                                <label>Payment Mode <span>*</span></label>

                                <select name="payment_mode"
                                        class="form-select"
                                        required>

                                    <option value="1"
                                        {{ old('payment_mode', $booking->payment_mode) == 1 ? 'selected' : '' }}>
                                        Cash
                                    </option>

                                    <option value="2"
                                        {{ old('payment_mode', $booking->payment_mode) == 2 ? 'selected' : '' }}>
                                        Bank Transfer
                                    </option>

                                    <option value="3"
                                        {{ old('payment_mode', $booking->payment_mode) == 3 ? 'selected' : '' }}>
                                        UPI
                                    </option>

                                </select>

                            </div>

                               <div class="col-md-4">
                        <label>Addons Amount</label>

                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                          <input type="number"
       name="addonamount"
       id="addonamount"
       class="form-control"
       step="0.01"
       min="0"
       value="{{ old('addonamount',  $booking->addonamount) }}"
       placeholder="0.00" readonly>
                        </div>
                    </div>

                              <div class="col-md-4">
                        <label>Discount</label>

                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                          <input type="number"
       name="discount"
       id="discount"
       class="form-control"
       step="0.01"
       min="0"
       value="{{ old('discount',  $booking->discount) }}"
       placeholder="0.00" >
                        </div>
                    </div>


                            <div class="col-md-4">

                                <label>Received Amount</label>

                                <input type="number"
                                       name="received_amount"
                                        id="received_amount"
                                       class="form-control"
                                       step="0.01"
                                       value="{{ old('received_amount', $booking->received_amount) }}">

                            </div>


                            <div class="col-md-4">

                                <label>Pending Amount</label>

                                <input type="number"
                                       name="pending_amount"
                                       id="pending_amount"
                                       class="form-control"
                                       step="0.01"
                                       value="{{ old('pending_amount', $booking->pending_amount) }}">

                            </div>

                        </div>

                    </div>


                    <div class="booking-footer">

                        <a href="{{ route('bookings.show', $booking->id) }}"
                           class="btn booking-cancel-btn">
                            Cancel
                        </a>

                        <button type="submit"
                                class="booking-save-btn">

                            <i class="fa fa-save me-1"></i>
                            Update Booking

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </section>

</div>


<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>

<script>
$(document).ready(function () {

    let passengerIndex =
        {{ count($passengers) }};

           function calculateTotal(passengerNumber) {

        let tourPrice = parseFloat($('#tour_price').val()) || 0;
        passengerNumber = parseInt(passengerNumber) || 0;

        let total = tourPrice * passengerNumber;

        $('#totalamount').val(total.toFixed(2));
    }



    $('#addPassenger').click(function () {

        let number = passengerIndex + 1;

        let html = `
            <div class="passenger-card">

                <input type="hidden"
                       name="passengers[${passengerIndex}][id]"
                       value="">

                <div class="passenger-card-header">

                    <div class="passenger-title">

                        <span class="passenger-number">
                            ${number}
                        </span>

                        <strong>
                            Passenger ${number}
                        </strong>

                    </div>

                    <button type="button"
                            class="remove-passenger-btn">

                        <i class="fa fa-trash"></i>

                    </button>

                </div>


                <div class="row g-3">

                    <div class="col-md-4">
                        <label>
                            Customer Name <span>*</span>
                        </label>

                        <input type="text"
                               name="passengers[${passengerIndex}][customername]"
                               class="form-control"
                               required>
                    </div>


                    <div class="col-md-4">
                        <label>
                            Age <span>*</span>
                        </label>

                        <input type="number"
                               name="passengers[${passengerIndex}][age]"
                               class="form-control"
                               min="1"
                               required>
                    </div>


                    <div class="col-md-4">
                        <label>Phone Number</label>

                        <input type="text"
                               name="passengers[${passengerIndex}][phonenumber]"
                               class="form-control">
                    </div>


                    <div class="col-md-4">
                        <label>Aadhaar Card Number</label>

                        <input type="text"
                               name="passengers[${passengerIndex}][adharcardnumber]"
                               class="form-control">
                    </div>


                    <div class="col-md-4">
                        <label>Aadhaar Card</label>

                        <input type="file"
                               name="passengers[${passengerIndex}][adharcardpf]"
                               class="form-control">
                    </div>


                    <div class="col-md-4">
                        <label>Seat Number</label>

                       <input type="text"
           name="passengers[${passengerIndex}][seatnumber]"
           class="form-control seat-number"
           placeholder="Enter seat number">

    <small class="seat-error text-danger" style="display:none;"></small>
                    </div>

                </div>

            </div>
        `;

        $('#passengerContainer').append(html);

        passengerIndex++;

                let passengerCount =
            $('#passengerContainer .passenger-card').length;

        $('#rowcout').val(passengerCount);

        calculateTotal(passengerCount);
        calculatePendingAmount();

    });


    $(document).on(
        'click',
        '.remove-passenger-btn',
        function () {

            $(this)
                .closest('.passenger-card')
                .remove();

            renumberPassengers();
            let passengerCount =
            $('#passengerContainer .passenger-card').length;

        $('#rowcout').val(passengerCount);

        calculateTotal(passengerCount);
        calculatePendingAmount();

        }
    );


    function renumberPassengers()
    {
        $('#passengerContainer .passenger-card')
            .each(function(index) {

                $(this)
                    .find('.passenger-number')
                    .text(index + 1);

                $(this)
                    .find('.passenger-card-header strong')
                    .text('Passenger ' + (index + 1));

            });
    }


    function calculatePendingAmount() {

    let totalAmount = parseFloat($('#totalamount').val()) || 0;
    let discount = parseFloat($('#discount').val()) || 0;
    let receivedAmount = parseFloat($('#received_amount').val()) || 0;

    let pendingAmount = totalAmount - (receivedAmount + discount);

    // Don't allow negative pending amount
    if (pendingAmount < 0) {
        pendingAmount = 0;
    }

    $('#pending_amount').val(pendingAmount.toFixed(2));
}



    let seatCheckTimer;

$(document).on('keyup', '.seat-number', function () {

    let seatInput = $(this);
    let seatNumber = seatInput.val().trim();
    let tourId = $('#tour_id').val();
    let errorMessage = seatInput.siblings('.seat-error');

    clearTimeout(seatCheckTimer);

    seatInput.removeClass('is-invalid');
    errorMessage.hide().text('');
    seatInput.data('seat-booked', false);

    if (seatNumber === '' || tourId === '') {
        return;
    }

    seatCheckTimer = setTimeout(function () {

        $.ajax({

            url: "{{ url('/check-seat') }}/" +
                 tourId + "/" +
                 encodeURIComponent(seatNumber),

            type: "GET",
            dataType: "json",

            success: function (response) {

                if (response.booked) {

                    seatInput.addClass('is-invalid');

                    errorMessage
                        .text('Seat ' + seatNumber + ' is already booked.')
                        .show();

                    seatInput.data('seat-booked', true);

                } else if (!response.valid) {

                    seatInput.addClass('is-invalid');

                    errorMessage
                        .text(response.message)
                        .show();

                    seatInput.data('seat-booked', true);

                } else {

                    seatInput.removeClass('is-invalid');

                    errorMessage.hide().text('');

                    seatInput.data('seat-booked', false);
                }
            },

            error: function () {

                seatInput.addClass('is-invalid');

                errorMessage
                    .text('Unable to check seat availability.')
                    .show();

                seatInput.data('seat-booked', true);
            }

        });

    }, 500);

});

$('#received_amount').on('input', function () {
    calculatePendingAmount();
});



});


$(document).ready(function () {

    const $total = $('#totalamount');

    // Existing total stored in the booking
    const existingTotal = parseFloat($total.val()) || 0;

    // Calculate previously selected add-ons
    let previousAddonsTotal = 0;

    $('.addon-checkbox:checked').each(function () {
        previousAddonsTotal += parseFloat($(this).data('price')) || 0;
    });

    // Recover the base amount
    const baseAmount = existingTotal - previousAddonsTotal;

    function calculateTotalAmount() {
        let addonsTotal = 0;

        $('.addon-checkbox:checked').each(function () {
            addonsTotal += parseFloat($(this).data('price')) || 0;
        });

        const totalAmount = baseAmount + addonsTotal;

        // Update total amount
        $total.val(totalAmount.toFixed(2));

        // Update add-on amount
        $('#addonamount').val(addonsTotal.toFixed(2));

        calculatePendingAmount();
    }

    function calculatePendingAmount() {
        const totalAmount = parseFloat($('#totalamount').val()) || 0;
        const discount = parseFloat($('#discount').val()) || 0;
        const receivedAmount = parseFloat($('#received_amount').val()) || 0;

        const pendingAmount = Math.max(
            0,
            totalAmount - discount - receivedAmount
        );

        $('#pending_amount').val(pendingAmount.toFixed(2));
    }

    // Recalculate total when add-ons change
    $(document).on('change', '.addon-checkbox', calculateTotalAmount);

    // Recalculate pending amount when payment details change
    $('#discount, #received_amount').on(
        'input change',
        calculatePendingAmount
    );

    // Initial calculation
    calculateTotalAmount();

});


</script>

@endsection