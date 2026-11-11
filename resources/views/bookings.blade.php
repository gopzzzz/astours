@extends('layouts.mainlayout')

@section('content')
<style>
    .booking-form-card {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
}

.booking-form-header {
    padding: 24px 28px;
    border-bottom: 1px solid #eee;
    background: #fafafa;
}

.booking-form-header h4 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
    color: #222;
}

.booking-form-header p {
    margin: 5px 0 0;
    color: #888;
    font-size: 14px;
}

.booking-section {
    padding: 25px 28px;
    border-bottom: 1px solid #eee;
}

.section-title {
    margin-bottom: 20px;
    font-size: 16px;
    font-weight: 700;
    color: #333;
    position: relative;
    padding-left: 12px;
}

.section-title:before {
    content: "";
    position: absolute;
    left: 0;
    top: 2px;
    width: 4px;
    height: 18px;
    border-radius: 5px;
    background: #0d6efd;
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
    box-shadow: none;
}

.booking-section textarea.form-control {
    min-height: 90px;
    resize: vertical;
}

.booking-section .form-control:focus,
.booking-section .form-select:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 3px rgba(13, 110, 253, .08);
}

.booking-section .input-group-text {
    background: #f8f9fa;
    border-color: #dfe3e8;
    color: #666;
}

.booking-form-footer {
    padding: 20px 28px;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    background: #fafafa;
}

.booking-cancel-btn {
    min-width: 100px;
    height: 42px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.booking-save-btn {
    min-width: 150px;
    height: 42px;
    border-radius: 8px;
    background: #0d6efd;
    color: #fff;
    font-weight: 600;
    border: none;
}

.booking-save-btn:hover {
    background: #0b5ed7;
    color: #fff;
}

@media (max-width: 767px) {
    .booking-section {
        padding: 20px 16px;
    }

    .booking-form-header {
        padding: 20px 16px;
    }

    .booking-form-footer {
        padding: 16px;
    }
}
.passenger-section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.passenger-help {
    margin: 0;
    color: #888;
    font-size: 13px;
}

.add-passenger-btn {
    background: #0d6efd;
    color: #fff;
    border-radius: 8px;
    padding: 9px 16px;
    font-size: 13px;
    font-weight: 600;
}

.add-passenger-btn:hover {
    background: #0b5ed7;
    color: #fff;
}

.passenger-card {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 15px;
    background: #fafafa;
}

.passenger-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
    color: #333;
}

.remove-passenger-btn {
    border: none;
    background: #fff0f0;
    color: #dc3545;
    width: 34px;
    height: 34px;
    border-radius: 7px;
}

.remove-passenger-btn:hover {
    background: #dc3545;
    color: #fff;
}

@media (max-width: 767px) {
    .passenger-section-header {
        align-items: flex-start;
        gap: 15px;
        flex-direction: column;
    }
}
</style>

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

               


            </div>

        </div>
    </section>


    <!-- Main Content -->
    <section class="content">

        <div class="container-fluid">

            {{-- Success Message --}}
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            {{-- Error Message --}}
            @if(session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif


            {{-- Validation Errors --}}
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="card">

              


                <div class="card-body">

                  <div class="container-fluid py-4">

    <div class="booking-form-card">

        <div class="booking-form-header">
            <div>
                <h4>New Booking</h4>
                <p>Enter the customer and tour booking details</p>
            </div>
        </div>

        <form action="{{ route('bookings.store') }}" method="POST"   enctype="multipart/form-data" id="bookingForm">
            @csrf

            

            <div class="booking-section">
                <h6 class="section-title">Tour Details</h6>

                <div class="row g-3">

                    <div class="col-md-4">
                        <label>Tour <span>*</span></label>
                       <select name="tour_id" id="tour_id" class="form-select" required>
    <option value="">Select Tour</option>

    @foreach($tours as $tour)
        <option value="{{ $tour->id }}"
            {{ old('tour_id') == $tour->id ? 'selected' : '' }}>
            {{ $tour->tourname }} -
            {{ \Carbon\Carbon::parse($tour->date)->format('d-m-Y') }}
        </option>
    @endforeach
</select>
                    </div>

                    <div class="col-md-4">
                        <label>Total Number <span>*</span></label>
                        <input type="number"
       name="totalnumber"
       class="form-control"
       min="1"
       value="{{ old('totalnumber') }}"
       placeholder="Number of persons"
       required>
                    </div>

                    <div class="col-md-4">
                        <label>Booking Date <span>*</span></label>
                     <input type="date"
       name="bookingdate"
       class="form-control"
       value="{{ old('bookingdate', date('Y-m-d')) }}"
       required>
                    </div>

                    <div class="col-md-6">
                        <label>Pickup Location</label>

                        <select name="pickuplocation" id="pickup_location" class="form-select" required>
    <option value="">Select Pickup Location</option>
</select>

                    </div>

                  
                </div>
            </div>

            <div class="booking-section">

    <div class="passenger-section-header">
        <div>
            <h6 class="section-title mb-1">Passenger Details</h6>
            <p class="passenger-help">Add the details of all passengers included in this booking.</p>
        </div>
      
        <button type="button" class="btn add-passenger-btn" id="addPassenger">
            <i class="fa fa-plus"></i> Add Passenger
        </button>
    </div>

    <input type="hidden" id="rowcout">

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

    @foreach($oldPassengers as $index => $passenger)

        <div class="passenger-card">

            <div class="passenger-card-header">

                <strong>
                    Passenger {{ $index + 1 }}
                </strong>

                @if($index > 0)
                    <button type="button"
                            class="remove-passenger-btn">
                        <i class="fa fa-trash"></i>
                    </button>
                @endif

            </div>

            <div class="row g-3">

                <div class="col-md-4">
                    <label>Customer Name <span>*</span></label>

                    <input type="text"
                           name="passengers[{{ $index }}][customername]"
                           class="form-control"
                           value="{{ $passenger['customername'] ?? '' }}"
                           placeholder="Enter customer name"
                           required>
                </div>

                <div class="col-md-4">
                    <label>Age <span>*</span></label>

                    <input type="number"
                           name="passengers[{{ $index }}][age]"
                           class="form-control"
                           value="{{ $passenger['age'] ?? '' }}"
                           min="1"
                           placeholder="Enter age"
                           required>
                </div>

                <div class="col-md-4">
                    <label>Phone Number</label>

                    <input type="text"
                           name="passengers[{{ $index }}][phonenumber]"
                           class="form-control"
                           value="{{ $passenger['phonenumber'] ?? '' }}"
                           placeholder="Enter phone number">
                </div>

                <div class="col-md-4">
                    <label>Aadhaar Card Number</label>

                    <input type="text"
                           name="passengers[{{ $index }}][adharcardnumber]"
                           class="form-control"
                           value="{{ $passenger['adharcardnumber'] ?? '' }}"
                           placeholder="Enter Aadhaar number">
                </div>

                <div class="col-md-4">
                    <label>Aadhaar Card</label>

                    <input type="file"
                           name="passengers[{{ $index }}][adharcardpf]"
                           class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Seat Number</label>

                   <input type="text"
       name="passengers[{{ $index }}][seatnumber]"
       class="form-control seat-number"
       value="{{ $passenger['seatnumber'] ?? '' }}"
       placeholder="Enter seat number">

<small class="seat-error text-danger" style="display:none;"></small>

            </div>

        </div>

    @endforeach

</div>
</div>

<div class="booking-section">
                <h6 class="section-title">Emergency Contact  Details</h6>

                <div class="row g-3">

                    
                    <div class="col-md-4">
                        <label>Emergency Contact Number <span>*</span></label>
                        <input type="text"
       name="phonenumber"
       class="form-control"
       value="{{ old('phonenumber') }}"
       placeholder="Enter phone number"
       required>
                    </div>

                    <div class="col-md-4">
                        <label>Person with Relationship <span>*</span></label>
                        <input type="text"
       name="booking_personname"
       class="form-control"
       value="{{ old('booking_personname') }}"
       placeholder="Enter customer name"
       required>

                    </div>


                    <!-- <div class="col-md-4">
                        <label>Email</label>
                       <input type="email"
       name="mail"
       class="form-control"
       value="{{ old('mail') }}"
       placeholder="Enter email address">
                    </div> -->

                    <!-- <div class="col-md-12">
                        <label>Address</label>
                      <textarea name="address"
          class="form-control"
          rows="3"
          placeholder="Enter address">{{ old('address') }}</textarea>
                    </div> -->

                </div>
            </div>

            <div class="booking-section">
                <h6 class="section-title">Payment Details</h6>

                <div class="row g-3">

                    <div class="col-md-4">
                        <label>Total Amount <span>*</span></label>

                        <input type="hidden" id="tour_price">

                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                          <input type="number"
       name="totalamount"
       id="totalamount"
       class="form-control"
       step="0.01"
       min="0"
       value="{{ old('totalamount') }}"
       placeholder="0.00"
       required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Payment Status <span>*</span></label>
                       <select name="payment_status" class="form-select" required>
    <option value="">Select Status</option>

    <option value="0" {{ old('payment_status') == '0' ? 'selected' : '' }}>
        Pending
    </option>

    <option value="1" {{ old('payment_status') == '1' ? 'selected' : '' }}>
        Partially Paid
    </option>

    <option value="2" {{ old('payment_status') == '2' ? 'selected' : '' }}>
        Paid
    </option>
</select>
                    </div>

                    <div class="col-md-4">
                        <label>Payment Mode <span>*</span></label>
                        <select name="payment_mode" class="form-select" required>
    <option value="">Select Payment Mode</option>

    <option value="1" {{ old('payment_mode') == '1' ? 'selected' : '' }}>
        Cash
    </option>

    <option value="2" {{ old('payment_mode') == '2' ? 'selected' : '' }}>
        Bank Transfer
    </option>

    <option value="3" {{ old('payment_mode') == '3' ? 'selected' : '' }}>
        UPI
    </option>
</select>
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
       value="{{ old('discount', 0) }}"
       placeholder="0.00">
                        </div>
                    </div>

                     <div class="col-md-4">
                        <label>Received Amount</label>

                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                          <input type="number"
       name="received_amount"
       id="received_amount"
       class="form-control"
       step="0.01"
       min="0"
       value="{{ old('received_amount', 0) }}"
       placeholder="0.00">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label>Pending Amount</label>

                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                         <input type="number"
       name="pending_amount"
       id="pending_amount"
       class="form-control"
       step="0.01"
       min="0"
       value="{{ old('pending_amount', 0) }}"
       placeholder="0.00">
                        </div>
                    </div>

                </div>
            </div>

            <div class="booking-form-footer">
                <a href="{{ route('bookings.index') }}"
                   class="btn btn-light booking-cancel-btn">
                    Cancel
                </a>

                <button type="submit"
                        class="btn booking-save-btn">
                    <i class="fa fa-check me-1"></i>
                    Create Booking
                </button>
            </div>

        </form>
    </div>

</div>

                </div>

            </div>

        </div>

    </section>

</div>


<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<script>
$(document).ready(function () {

    function calculateTotal(passengerNumber) {

        let tourPrice = parseFloat($('#tour_price').val()) || 0;
        passengerNumber = parseInt(passengerNumber) || 0;

        let total = tourPrice * passengerNumber;

        $('#totalamount').val(total.toFixed(2));
    }


    let passengerIndex = {{ count($oldPassengers) }};


    // ADD PASSENGER
    $('#addPassenger').click(function () {

        let passengerNumber = passengerIndex + 1;

        let html = `
            <div class="passenger-card">

                <div class="passenger-card-header">
                    <strong>Passenger ${passengerNumber}</strong>

                    <button type="button"
                            class="remove-passenger-btn">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>

                <div class="row g-3">

                    <div class="col-md-4">
                        <label>Customer Name <span>*</span></label>

                        <input type="text"
                               name="passengers[${passengerIndex}][customername]"
                               class="form-control"
                               placeholder="Enter customer name"
                               required>
                    </div>

                    <div class="col-md-4">
                        <label>Age <span>*</span></label>

                        <input type="number"
                               name="passengers[${passengerIndex}][age]"
                               class="form-control"
                               min="1"
                               placeholder="Enter age"
                               required>
                    </div>

                    <div class="col-md-4">
                        <label>Phone Number</label>

                        <input type="text"
                               name="passengers[${passengerIndex}][phonenumber]"
                               class="form-control"
                               placeholder="Enter phone number">
                    </div>

                    <div class="col-md-4">
                        <label>Aadhaar Card Number</label>

                        <input type="text"
                               name="passengers[${passengerIndex}][adharcardnumber]"
                               class="form-control"
                               placeholder="Enter Aadhaar number">
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


    // REMOVE PASSENGER
    $(document).on('click', '.remove-passenger-btn', function () {

        $(this).closest('.passenger-card').remove();

        // Re-number passengers
        $('#passengerContainer .passenger-card').each(function(index) {

            $(this).find('.passenger-card-header strong')
                .text('Passenger ' + (index + 1));

        });

        let passengerCount =
            $('#passengerContainer .passenger-card').length;

        $('#rowcout').val(passengerCount);

        calculateTotal(passengerCount);
        calculatePendingAmount();
    });


    // TOUR CHANGE
    $('#tour_id').on('change', function () {

        let tourId = $(this).val();

        $('#pickup_location').html(
            '<option value="">Loading...</option>'
        );

        $('#tour_price').val('');
        $('#totalamount').val('');

        if (tourId === '') {

            $('#pickup_location').html(
                '<option value="">Select Pickup Location</option>'
            );

            return;
        }


        $.ajax({

            url: "{{ url('/tour-pickup-locations') }}/" + tourId,

            type: "GET",

            dataType: "json",

            success: function (response) {

                if (response.success) {

                    // Pickup locations
                    $('#pickup_location').html(
                        '<option value="">Select Pickup Location</option>'
                    );

                    $.each(
                        response.pickup_locations,
                        function (index, location) {

                            $('#pickup_location').append(
                                $('<option>', {
                                    value: location,
                                    text: location
                                })
                            );

                        }
                    );


                    // Set tour price
                    $('#tour_price').val(response.price);


                    // Calculate total AFTER AJAX response
                    let passengerCount =
                        $('#passengerContainer .passenger-card').length;

                    $('#rowcout').val(passengerCount);

                    calculateTotal(passengerCount);
                    calculatePendingAmount();
                }

            },

            error: function () {

                $('#pickup_location').html(
                    '<option value="">No pickup locations found</option>'
                );

                $('#tour_price').val('');
                $('#totalamount').val('');
            }

        });

    });

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


// When discount changes
$('#discount').on('input', function () {
    calculatePendingAmount();
});


// When received amount changes
$('#received_amount').on('input', function () {
    calculatePendingAmount();
});

let seatCheckTimer;

$(document).on('keyup', '.seat-number', function () {

    let seatInput = $(this);
    let seatNumber = seatInput.val().trim();
    let tourId = $('#tour_id').val();
    let errorMessage = seatInput.siblings('.seat-error');

    // Reset
    seatInput.removeClass('is-invalid');
    errorMessage.hide().text('');

    clearTimeout(seatCheckTimer);

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

        // Already booked
        seatInput.addClass('is-invalid');

        errorMessage
            .text('Seat ' + seatNumber + ' is already booked.')
            .show();

        seatInput.data('seat-booked', true);

    } else if (!response.valid) {

        // Seat number exceeds maximum seats
        seatInput.addClass('is-invalid');

        errorMessage
            .text(response.message)
            .show();

        seatInput.data('seat-booked', true);

    } else {

        // Seat available
        seatInput.removeClass('is-invalid');

        errorMessage.hide().text('');

        seatInput.data('seat-booked', false);
    }
}

        });

    }, 500);
});

$('#bookingForm').on('submit', function (e) {

    let invalidSeat = false;

    $('.seat-number').each(function () {

        if ($(this).data('seat-booked') === true) {
            invalidSeat = true;
            $(this).addClass('is-invalid');
        }

    });

    if (invalidSeat) {

        e.preventDefault();

        // Scroll to first invalid seat
        $('html, body').animate({
            scrollTop: $('.seat-number.is-invalid').first().offset().top - 100
        }, 300);

        return false;
    }

});

});
</script>



@endsection