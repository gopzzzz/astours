@extends('layouts.weblayout')

@section('content')
<style>
  .tour-features {
    margin-top: 20px;
}

.tour-features h4 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 12px;
    color: #222;
}

.tour-features ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.tour-features ul li {
    position: relative;
    padding-left: 25px;
    margin-bottom: 10px;
    font-size: 15px;
    line-height: 1.5;
    color: #555;
}

.tour-features ul li::before {
    content: "•";
    position: absolute;
    left: 5px;
    top: 0;
    font-size: 20px;
    font-weight: bold;
    color: #2e7d32;
}
.tour-booking-info {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin: 22px 0;
}

.booking-info-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 18px;
    border-radius: 16px;
    background: #ffffff;
    border: 1px solid #e9ecef;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
    transition: all 0.25s ease;
    overflow: hidden;
}

.booking-info-card::after {
    content: "";
    position: absolute;
    width: 70px;
    height: 70px;
    right: -25px;
    bottom: -30px;
    border-radius: 50%;
    opacity: 0.08;
}

.booking-info-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.10);
}

.booking-info-icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 20px;
    font-weight: 700;
}

.booking-info-label {
    display: block;
    margin-bottom: 4px;
    font-size: 13px;
    font-weight: 500;
    color: #777;
}

.booking-info-content strong {
    display: block;
    font-size: 21px;
    line-height: 1.2;
}

/* Price */
.price-card .booking-info-icon {
    background: #eaf7ed;
    color: #198754;
}

.price-card .booking-info-content strong {
    color: #198754;
}

.price-card::after {
    background: #198754;
}

/* Seats */
.seat-card .booking-info-icon {
    background: #eef5ff;
    color: #1769aa;
}

.seat-card .booking-info-content strong {
    color: #1769aa;
}

.seat-card::after {
    background: #1769aa;
}


/* Mobile */
@media (max-width: 576px) {

    .tour-booking-info {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .booking-info-card {
        padding: 15px;
    }

    .booking-info-icon {
        width: 44px;
        height: 44px;
        min-width: 44px;
    }

    .booking-info-content strong {
        font-size: 19px;
    }
}
  </style>


<div class="inner-page-banner" style="background-image: url('{{ asset('public/uploads/tours/' . $tour->image) }}');">
  <div class="banner-glass-caption">
    <h1>{{$tour->tourname}}</h1>
    <p>Tour Date : {{ \Carbon\Carbon::parse($tour->date)->format('d-m-Y') }}</p>
  </div>

</div>

<section style="padding:60px 0 80px;">
  <div style="max-width:1200px;margin:0 auto;padding:0 24px;">
   
        <!-- <span style="font-size:0.8rem;font-weight:700;letter-spacing:1.5px;color:#EA580C;text-transform:uppercase;">Company Profile</span> -->
        <!-- <h2 style="font-size:2.1rem;font-weight:800;color:#201713;margin:6px 0 16px;">Pandavas Holidays, North Paravur</h2> -->
        <p style="font-size:0.95rem;color:#756B63;line-height:1.8;margin-bottom:14px;">{{$tour->description}}</p>
        <p style="font-size:0.95rem;color:#756B63;line-height:1.8;margin-bottom:18px;">Our mission is to combine the warmth of traditional hospitality with state-of-the-art motorcoach engineering. Every journey is planned with passenger safety, comfort, and delight at its heart.</p>
  <div class="tour-features">
    <h4>Features</h4>

    <ul>
        @foreach(explode(',', $tour->features) as $feature)
            @if(trim($feature) !== '')
                <li>{{ trim($feature) }}</li>
            @endif
        @endforeach
    </ul>
</div>
      </div>
    </div> 


  </div>
</section>

  <div class="tour-booking-info">

    <div class="booking-info-card price-card">
        <div class="booking-info-icon">
            ₹
        </div>

        <div class="booking-info-content">
            <span class="booking-info-label">Amount Per Head</span>
            <strong>₹{{ number_format($tour->amount) }}</strong>
        </div>
    </div>

    <div class="booking-info-card seat-card">
        <div class="booking-info-icon">
            <i class="fa-solid fa-chair"></i>
        </div>

        <div class="booking-info-content">
            <span class="booking-info-label">Available Seats</span>
            <strong>{{$available_seats}}</strong>
        </div>
    </div>

</div>

@if(Auth::check())

<div class="seat-booking-page-wrap">
<a href="userpackage.html" class="btn-back-packages">Back to Tour Packages</a>
<div class="bus-visual-stage">
    <img src="{{asset('public/web/images/clean_bus.png')}}" alt="Overhead Bus Layout" class="bus-base-img" />
<div class="seat-grid-overlay">
      <div class="seat-quad-rows">
        <div class="seat-row-pair" id="seatRow4"></div>
        <div class="seat-row-pair" id="seatRow3"></div>
        <div class="seat-aisle-spacer"></div>
        <div class="seat-row-pair" id="seatRow2"></div>
        <div class="seat-row-pair" id="seatRow1"></div>
      </div>
<div class="seat-column-labels" aria-hidden="true"></div>
    </div>
  </div>
<div class="seat-legend" aria-label="Seat status">
    <span><i class="seat-legend-dot available"></i>Available</span>
    <span><i class="seat-legend-dot selected"></i>Selected</span>
    <span><i class="seat-legend-dot booked"></i>Already Booked</span>
  </div>
 
</div>


@else 


<form action="{{ route('booking.trainbooking') }}" method="POST" id="memberBookingForm">
    @csrf

    <input type="hidden"
           name="tour_id"
           value="{{ $tour->id }}">

    <div class="member-booking-box">

        <!-- Header -->
        <div class="booking-box-header">
            <div class="booking-header-icon">
                <i class="fas fa-users"></i>
            </div>

            <div>
                <h4>Booking Details</h4>
                <p>Enter the number of members travelling</p>
            </div>
        </div>

        <!-- Member Input -->
        <div class="member-input-section">

            <label for="totalMembers">
                Number of Members
            </label>

            <div class="member-input-wrapper">

                <button type="button"
                        class="member-control-btn"
                        onclick="changeMembers(-1)">
                    <i class="fas fa-minus"></i>
                </button>

                <input type="number"
                       name="total_members"
                       id="totalMembers"
                       value="1"
                       min="1"
                       max="50"
                       readonly>

                <button type="button"
                        class="member-control-btn"
                        onclick="changeMembers(1)">
                    <i class="fas fa-plus"></i>
                </button>

            </div>

            <span class="member-helper-text">
                Select how many members will be travelling
            </span>

        </div>

        <!-- Continue Button -->
        <button type="submit"
                class="booking-continue-btn">

            <span>Continue Booking</span>

            <i class="fas fa-arrow-right"></i>

        </button>

    </div>

</form>


<style>

.member-booking-box {
    width: 100%;
    max-width: 600px;
    margin: 25px auto;

    background: #ffffff;
    border: 1px solid #e9e9e9;
    border-radius: 20px;

    padding: 25px;

    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.07);
}


/* Header */

.booking-box-header {
    display: flex;
    align-items: center;
    gap: 15px;

    padding-bottom: 20px;
    border-bottom: 1px solid #eeeeee;
}

.booking-header-icon {
    width: 52px;
    height: 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f3f7ff;
    color: #2563eb;

    border-radius: 14px;

    font-size: 21px;
}

.booking-box-header h4 {
    margin: 0;

    font-size: 19px;
    font-weight: 700;

    color: #1f2937;
}

.booking-box-header p {
    margin: 4px 0 0;

    font-size: 13px;
    color: #8a8a8a;
}


/* Input Section */

.member-input-section {
    padding: 25px 0;
}

.member-input-section label {
    display: block;

    margin-bottom: 10px;

    font-size: 14px;
    font-weight: 600;

    color: #374151;
}


/* Counter */

.member-input-wrapper {
    width: 100%;
    height: 58px;

    display: flex;
    align-items: center;

    border: 1px solid #dfe3e8;
    border-radius: 13px;

    overflow: hidden;

    background: #fafafa;
}

.member-control-btn {
    width: 58px;
    height: 100%;

    border: none;
    background: transparent;

    color: #2563eb;

    font-size: 15px;

    cursor: pointer;

    transition: 0.2s;
}

.member-control-btn:hover {
    background: #eef4ff;
}

#totalMembers {
    flex: 1;

    height: 100%;

    border: none;
    outline: none;

    background: transparent;

    text-align: center;

    font-size: 22px;
    font-weight: 700;

    color: #222;
}

.member-helper-text {
    display: block;

    margin-top: 8px;

    font-size: 12px;
    color: #929292;
}


/* Continue Button */

.booking-continue-btn {
    width: 100%;
    height: 52px;

    border: none;
    border-radius: 12px;

    background: #198754;
    color: #ffffff;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 10px;

    font-size: 15px;
    font-weight: 600;

    cursor: pointer;

    transition: 0.2s;
}

.booking-continue-btn:hover {
    background: #157347;

    transform: translateY(-1px);

    box-shadow: 0 7px 18px rgba(25, 135, 84, 0.22);
}


/* Mobile */

@media (max-width: 576px) {

    .member-booking-box {
        padding: 20px;

        border-radius: 16px;
    }

    .booking-box-header h4 {
        font-size: 17px;
    }

    .member-control-btn {
        width: 50px;
    }
}

</style>



@endif


<!-- <form action="{{ route('booking.confirm') }}" method="POST">
    @csrf

    <div class="selected-seats-card-amber">

        <input type="hidden"
               name="tour_id"
               value="{{ $tour->id }}">

        <input type="hidden"
               name="total_seat"
               id="totalSeat"
               value="2,3">

           <div class="status-text" id="selectedSeatsStatusText">Selected Seats: None</div>   

        <button type="submit"
                class="btn-confirm-seats-green"
                id="confirmSeatsActionBtn">
            Confirm Seats
        </button>

    </div>

</form> -->



@endsection

<style>
    .bus-seat-box {
    cursor: pointer;
    transition: 0.2s ease;
}

.bus-seat-box.selected {
    background-color: red !important;
    color: white !important;
    border-color: red !important;
}
    </style>

<script>
window.PANDAVAS_SEAT_CONFIG = window.PANDAVAS_SEAT_CONFIG || {
  totalSeats: {{$tour->total_seats}},
  bookedSeats: @json($bookedseats)
};
</script>

<script>

function changeMembers(value) {

    const input = document.getElementById("totalMembers");

    let currentValue = parseInt(input.value) || 1;

    currentValue += value;

    // Minimum 1
    if (currentValue < 1) {
        currentValue = 1;
    }

    // Maximum 50
    if (currentValue > 50) {
        currentValue = 50;
    }

    input.value = currentValue;
}

</script>
