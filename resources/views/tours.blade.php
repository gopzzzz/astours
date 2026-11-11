@extends('layouts.mainlayout')

@section('content')
<style>
    /* =====================================================
   TOUR MANAGEMENT PAGE
===================================================== */

.tour-page {
    padding: 8px 0 30px;
}


/* =====================================================
   PAGE HEADER
===================================================== */

.tour-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
}

.tour-breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #9aa3b1;
    font-size: 11px;
    margin-bottom: 8px;
}

.tour-breadcrumb i {
    font-size: 8px;
}

.tour-breadcrumb strong {
    color: #596372;
}

.tour-page-header h2 {
    margin: 0;
    color: #202735;
    font-size: 24px;
    font-weight: 700;
}

.tour-page-header p {
    margin: 5px 0 0;
    color: #929aaa;
    font-size: 12px;
}


/* Add button */

.tour-add-btn {
    height: 42px;
    padding: 0 18px;

    border: 0;
    border-radius: 9px;

    background: #3867e8;
    color: #fff;

    font-size: 12px;
    font-weight: 600;

    box-shadow: 0 5px 15px rgba(56,103,232,.20);

    transition: .2s ease;
}

.tour-add-btn i {
    margin-right: 7px;
}

.tour-add-btn:hover {
    background: #2f59d1;
    color: #fff;
    transform: translateY(-1px);
}


/* =====================================================
   ALERTS
===================================================== */

.tour-alert {
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 12px 15px;
    margin-bottom: 18px;

    border-radius: 9px;
    font-size: 12px;
}

.tour-alert-success {
    background: #effaf3;
    color: #23864b;
    border: 1px solid #d8f1e0;
}

.tour-alert-danger {
    background: #fff2f2;
    color: #c83c3c;
    border: 1px solid #f4dada;
}

.tour-alert-close {
    margin-left: auto;
    border: 0;
    background: transparent;
    color: inherit;
}


/* =====================================================
   STATISTICS
===================================================== */

.tour-stat-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 20px;
}

.tour-stat-card {
    display: flex;
    align-items: center;
    gap: 13px;

    padding: 17px;

    background: #fff;
    border: 1px solid #e8ebf0;
    border-radius: 13px;

    box-shadow: 0 3px 12px rgba(25,35,55,.035);
}

.tour-stat-icon {
    width: 42px;
    height: 42px;
    min-width: 42px;

    border-radius: 11px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 15px;
}

.tour-stat-icon.blue {
    background: #eef4ff;
    color: #3867e8;
}

.tour-stat-icon.green {
    background: #edf9f2;
    color: #2da565;
}

.tour-stat-icon.orange {
    background: #fff6e9;
    color: #ed9a25;
}

.tour-stat-icon.purple {
    background: #f4efff;
    color: #805ad5;
}

.tour-stat-card span {
    display: block;
    color: #929aaa;
    font-size: 10px;
    margin-bottom: 3px;
}

.tour-stat-card strong {
    color: #252d3a;
    font-size: 18px;
    font-weight: 700;
}


/* =====================================================
   LIST CARD
===================================================== */

.tour-list-card {
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(25,35,55,.04);
}

.tour-list-header {
    padding: 17px 20px;
    border-bottom: 1px solid #edf0f4;
}

.tour-list-header h4 {
    margin: 0;
    color: #252d3a;
    font-size: 14px;
    font-weight: 700;
}

.tour-list-header h4 i {
    color: #3867e8;
    margin-right: 7px;
}

.tour-list-header span {
    display: block;
    margin-top: 4px;
    color: #9aa3b0;
    font-size: 10px;
}


/* =====================================================
   TABLE
===================================================== */

.tour-table {
    margin: 0;
    min-width: 950px;
}

.tour-table thead {
    background: #f8f9fb;
}

.tour-table thead th {
    padding: 13px 16px;

    border: 0;
    border-bottom: 1px solid #e9edf2;

    color: #707988;
    font-size: 10px;
    font-weight: 700;

    text-transform: uppercase;
    letter-spacing: .3px;
    white-space: nowrap;
}

.tour-table tbody td {
    padding: 13px 16px;

    border: 0;
    border-bottom: 1px solid #f0f2f5;

    vertical-align: middle;

    color: #4c5563;
    font-size: 11px;
}

.tour-table tbody tr {
    transition: .2s ease;
}

.tour-table tbody tr:hover {
    background: #fafbff;
}

.tour-table tbody tr:last-child td {
    border-bottom: 0;
}


/* ID */

.tour-id {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 28px;
    height: 27px;

    padding: 0 7px;

    border-radius: 7px;

    background: #f1f4f8;
    color: #697382;

    font-size: 10px;
    font-weight: 600;
}


/* =====================================================
   TOUR NAME
===================================================== */

.tour-name-cell {
    display: flex;
    align-items: center;
    gap: 11px;
}

.tour-list-image {
    width: 54px;
    height: 43px;

    border-radius: 8px;

    object-fit: cover;

    border: 1px solid #e5e9ef;
}

.tour-name-cell strong {
    display: block;
    color: #2d3542;
    font-size: 12px;
    font-weight: 600;
}

.tour-name-cell small {
    display: block;
    margin-top: 3px;
    color: #9ba3b0;
    font-size: 9px;
}


/* =====================================================
   SCHEDULE
===================================================== */

.tour-schedule {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.tour-schedule div {
    color: #657080;
    font-size: 10px;
}

.tour-schedule i {
    width: 14px;
    color: #8c97a6;
}


/* Price */

.tour-price {
    color: #2c8b55;
    font-size: 12px;
    font-weight: 700;
}


/* Seats */

.tour-seat-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    padding: 6px 9px;

    border-radius: 7px;

    background: #f1f5ff;
    color: #3867e8;

    font-size: 10px;
    font-weight: 600;
}


/* Pickup */

.tour-pickup {
    display: flex;
    align-items: center;
    gap: 7px;

    max-width: 150px;

    color: #667080;
}

.tour-pickup i {
    color: #e05c5c;
    font-size: 11px;
}

.tour-pickup span {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* Edit */

.tour-edit-btn {
    height: 32px;

    padding: 0 11px;

    border: 1px solid #dbe4ff;
    border-radius: 7px;

    background: #f1f5ff;
    color: #3867e8;

    font-size: 10px;
    font-weight: 600;

    transition: .2s ease;
}

.tour-edit-btn i {
    margin-right: 4px;
}

.tour-edit-btn:hover {
    background: #3867e8;
    color: #fff;
    border-color: #3867e8;
}


/* =====================================================
   EMPTY
===================================================== */

.tour-empty {
    text-align: center;
    padding: 55px 20px;
}

.tour-empty-icon {
    width: 55px;
    height: 55px;

    margin: 0 auto 12px;

    border-radius: 14px;

    background: #f1f4f8;
    color: #9aa3b0;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;
}

.tour-empty h4 {
    margin: 0;
    color: #3c4452;
    font-size: 14px;
}

.tour-empty p {
    margin: 5px 0 15px;
    color: #9ba3b0;
    font-size: 11px;
}

.tour-empty-btn {
    height: 35px;
    padding: 0 13px;

    border: 0;
    border-radius: 7px;

    background: #3867e8;
    color: #fff;

    font-size: 10px;
    font-weight: 600;
}


/* =====================================================
   MODAL
===================================================== */

.tour-modern-modal .modal-dialog {
    max-width: 950px;
}

.tour-modern-modal .modal-content {
    border: 0;
    border-radius: 17px;
    overflow: hidden;

    box-shadow: 0 25px 70px rgba(20,30,50,.20);
}


/* Modal Header */

.tour-modal-header {
    display: flex;
    align-items: center;
    gap: 13px;

    padding: 19px 22px;

    background: #fff;
    border-bottom: 1px solid #edf0f4;
}

.tour-modal-icon {
    width: 44px;
    height: 44px;

    border-radius: 12px;

    background: #eef4ff;
    color: #3867e8;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 16px;
}

.tour-modal-icon.edit {
    background: #f1f5ff;
    color: #3867e8;
}

.tour-modal-header h4 {
    margin: 0;
    color: #202735;
    font-size: 16px;
    font-weight: 700;
}

.tour-modal-header p {
    margin: 4px 0 0;
    color: #929aaa;
    font-size: 10px;
}

.tour-modal-close {
    margin-left: auto;

    width: 33px;
    height: 33px;

    border: 0;
    border-radius: 8px;

    background: #f5f6f8;
    color: #7d8694;
}

.tour-modal-close:hover {
    background: #eceef2;
}


/* Modal Body */

.tour-modal-body {
    padding: 20px;
    background: #f7f8fc;

    max-height: 72vh;
    overflow-y: auto;
}


/* =====================================================
   FORM SECTIONS
===================================================== */

.tour-form-section {
    padding: 19px;

    background: #fff;

    border: 1px solid #e7ebf1;
    border-radius: 14px;

    margin-bottom: 15px;

    box-shadow: 0 2px 8px rgba(25,35,55,.03);
}

.tour-form-section:last-child {
    margin-bottom: 0;
}

.tour-form-title {
    display: flex;
    align-items: center;
    gap: 10px;

    padding-bottom: 14px;
    margin-bottom: 18px;

    border-bottom: 1px solid #edf0f4;
}

.tour-form-title > div {
    width: 36px;
    height: 36px;

    border-radius: 9px;

    background: #eef4ff;
    color: #3867e8;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 13px;
}

.tour-form-title span {
    display: flex;
    flex-direction: column;
}

.tour-form-title strong {
    color: #2b3340;
    font-size: 13px;
}

.tour-form-title small {
    margin-top: 3px;
    color: #9aa3b0;
    font-size: 9px;
}


/* =====================================================
   FORM INPUT
===================================================== */

.tour-form-section label {
    display: block;

    margin-bottom: 7px;

    color: #3d4654;
    font-size: 11px;
    font-weight: 600;
}

.tour-form-section label b {
    color: #ef4444;
}

.tour-form-input {
    position: relative;
}

.tour-form-input > i {
    position: absolute;

    left: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #9aa3b0;

    font-size: 12px;

    z-index: 2;
}

.tour-form-input .form-control {
    height: 42px;

    padding-left: 36px;

    border: 1px solid #dfe3e9;
    border-radius: 8px;

    color: #303744;
    font-size: 12px;

    box-shadow: none;

    transition: .2s ease;
}

.tour-form-input .form-control:focus {
    border-color: #3867e8;

    box-shadow:
        0 0 0 3px rgba(56,103,232,.09);
}


/* Amount */

.amount-field span {
    position: absolute;

    left: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #3867e8;

    font-weight: 700;

    z-index: 2;
}

.amount-field .form-control {
    padding-left: 31px;
}


/* =====================================================
   FILE INPUT
===================================================== */

.tour-file-input {
    height: 42px;

    position: relative;

    display: flex;
    align-items: center;

    border: 1px dashed #cbd3df;
    border-radius: 8px;

    background: #fafbff;

    overflow: hidden;
}

.tour-file-input > i {
    margin-left: 13px;

    color: #3867e8;

    font-size: 13px;
}

.tour-file-input input {
    position: absolute;
    inset: 0;

    width: 100%;
    height: 100%;

    opacity: 0;

    cursor: pointer;
}

.tour-form-section > small,
.tour-form-section small {
    display: block;

    margin-top: 6px;

    color: #9ba3b0;
    font-size: 9px;
}


/* =====================================================
   TEXTAREA
===================================================== */

.tour-description {
    min-height: 115px;

    padding: 11px 13px;

    border: 1px solid #dfe3e9;
    border-radius: 8px;

    color: #303744;

    font-size: 12px;
    line-height: 1.6;

    resize: vertical;

    box-shadow: none;
}

.tour-description:focus {
    border-color: #3867e8;

    box-shadow:
        0 0 0 3px rgba(56,103,232,.09);

    outline: none;
}


/* =====================================================
   CURRENT IMAGE
===================================================== */

.edit-image-preview {
    min-height: 88px;

    display: flex;
    align-items: center;
    gap: 12px;

    padding: 9px;

    background: #fafbfc;

    border: 1px solid #e1e5eb;
    border-radius: 9px;
}

.edit-image-preview img {
    width: 105px;
    height: 70px;

    border-radius: 7px;

    object-fit: cover;

    border: 1px solid #e1e5eb;
}

.edit-image-preview div {
    display: flex;
    flex-direction: column;
}

.edit-image-preview strong {
    color: #394150;
    font-size: 11px;

    max-width: 220px;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.edit-image-preview small {
    margin-top: 4px;
    color: #9aa3b0;
    font-size: 9px;
}


/* =====================================================
   MODAL FOOTER
===================================================== */

.tour-modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 9px;

    padding: 14px 20px;

    background: #fff;

    border-top: 1px solid #e8ebf0;
}

.tour-cancel-btn,
.tour-submit-btn {
    height: 40px;

    padding: 0 17px;

    border-radius: 8px;

    font-size: 11px;
    font-weight: 600;
}

.tour-cancel-btn {
    border: 1px solid #dfe3e9;

    background: #fff;
    color: #697281;
}

.tour-cancel-btn:hover {
    background: #f6f7f9;
}

.tour-submit-btn {
    border: 0;

    background: #3867e8;
    color: #fff;

    box-shadow: 0 4px 12px rgba(56,103,232,.20);

    transition: .2s ease;
}

.tour-submit-btn:hover {
    background: #2f59d1;
    color: #fff;
    transform: translateY(-1px);
}

.tour-modal-footer i {
    margin-right: 5px;
}


/* =====================================================
   SCROLLBAR
===================================================== */

.tour-modal-body::-webkit-scrollbar {
    width: 5px;
}

.tour-modal-body::-webkit-scrollbar-track {
    background: transparent;
}

.tour-modal-body::-webkit-scrollbar-thumb {
    background: #d1d6de;
    border-radius: 20px;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 991px) {

    .tour-stat-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 767px) {

    .tour-page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

    .tour-add-btn {
        width: 100%;
    }

    .tour-stat-grid {
        grid-template-columns: 1fr;
    }

    .tour-modal-body {
        padding: 13px;
    }

    .tour-form-section {
        padding: 15px;
    }

    .tour-modern-modal .modal-dialog {
        margin: 8px;
    }

    .tour-modal-header {
        padding: 15px;
    }

    .tour-modal-footer {
        padding: 12px;
    }

}
/* Filter Form */
.tour-filter-form {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

/* Inputs */
.tour-filter-form input {
    height: 42px;
    padding: 0 12px;
    border: 1px solid #dcdcdc;
    border-radius: 6px;
    background: #fff;
    color: #333;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
}

.tour-filter-form input[type="text"] {
    width: 240px;
}

.tour-filter-form input[type="date"] {
    width: 160px;
}

.tour-filter-form input:focus {
    border-color: #333;
}

/* Search Button */
.tour-filter-form .btn-search {
    height: 42px;
    padding: 0 20px;
    border: none;
    border-radius: 6px;
    background: #222;
    color: #fff;
    font-size: 14px;
    cursor: pointer;
}

.tour-filter-form .btn-search:hover {
    background: #000;
}

/* Clear Button */
.tour-filter-form .btn-clear {
    height: 42px;
    display: inline-flex;
    align-items: center;
    padding: 0 18px;
    border: 1px solid #dcdcdc;
    border-radius: 6px;
    background: #fff;
    color: #555;
    font-size: 14px;
    text-decoration: none;
    box-sizing: border-box;
}

.tour-filter-form .btn-clear:hover {
    background: #f5f5f5;
}

/* Mobile */
@media (max-width: 768px) {
    .tour-filter-form {
        flex-direction: column;
        align-items: stretch;
    }

    .tour-filter-form input[type="text"],
    .tour-filter-form input[type="date"],
    .tour-filter-form .btn-search,
    .tour-filter-form .btn-clear {
        width: 100%;
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

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Tours</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Tours
                        </li>
                    </ol>
                </div>

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

           <form method="GET" action="{{ url('tours') }}" class="tour-filter-form">

    <input
        type="text"
        name="search"
        placeholder="Search tour..."
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

    <a href="{{ url('tours') }}" class="btn-clear">
        Clear
    </a>
<a href="{{ route('tours.export', request()->query()) }}"
   class="btn-export">
    Export CSV
</a>

</form>

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Tours List
                    </h3>

                    <!-- ADD BUTTON -->
                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addTourModal">

                        <i class="fas fa-plus"></i>
                        Add Tour

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                          <div class="table-responsive">

            <table class="table tour-table">

                <thead>
                    <tr>

                        <th>#</th>

                          <th>Mode</th>

                        <th>Tour</th>

                         <th></th>

                        <th>Schedule</th>

                        <th>Price</th>

                        <th>Seats</th>

                        <th>Pickup Location</th>

                        <th>Action</th>

                    </tr>
                </thead>


                <tbody>

                    @forelse($tours as $tour)

                        <tr>

                            <!-- ID -->
                            <td>
                                <span class="tour-id">
                                    {{ $tour->id }}
                                </span>
                            </td>
                              <td>
                                <span class="tour-id">
                                    @if($tour->package_type == 1) Bus @else Train @endif
                                </span>
                            </td>




                            <!-- Tour -->
                            <td>

                                <div class="tour-name-cell">

                                    <img src="{{ asset('public/uploads/tours/' . $tour->image) }}"
                                         alt="{{ $tour->tourname }}"
                                         class="tour-list-image">

                                    <div>

                                        <strong>
                                            {{ $tour->tourname }}
                                        </strong>

                                        <small>
                                            Tour #{{ $tour->id }}
                                        </small>

                                    </div>

                                </div>

                            </td>

                             <td>

                                <a href="@if($tour->package_type == 1) {{url('booknow/'.$tour->slug)}} @else # @endif" target="_blank">
                                <button type="button" class="btn btn-sm btn-success">  Check Seats </button></a>
                              

                            </td>



                            <!-- Schedule -->
                            <td>

                                <div class="tour-schedule">

                                    <div>
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($tour->date)->format('d M Y') }}
                                    </div>

                                    <div>
                                        <i class="fas fa-clock"></i>
                                        {{ \Carbon\Carbon::parse($tour->time)->format('h:i A') }}
                                    </div>

                                </div>

                            </td>


                            <!-- Price -->
                            <td>

                                <span class="tour-price">
                                    ₹{{ number_format($tour->amount, 2) }}
                                </span>

                            </td>


                            <!-- Seats -->
                            <td>
                            
                            

                            <a href="@if($tour->package_type == 1) {{url('booknow/'.$tour->slug)}} @else # @endif" target="_blank">

                                <span class="tour-seat-badge">
                                    <i class="fas fa-users"></i>
                                    {{ $tour->total_seats }}
                                </span>
                            </a>

                            </td>


                            <!-- Pickup -->
                            <td>

                                <div class="tour-pickup">

                                    <i class="fas fa-map-marker-alt"></i>

                                    <span>
                                        {{ $tour->pickuplocations }}
                                    </span>

                                </div>

                            </td>


                            <!-- Action -->
                            <td>

                                <button type="button"
                                        class="tour-edit-btn"

                                        data-toggle="modal"
                                        data-target="#editTourModal"

                                        data-id="{{ $tour->id }}"
                                        data-tourname="{{ e($tour->tourname) }}"
                                        data-amount="{{ $tour->amount }}"
                                        data-total-seats="{{ $tour->total_seats }}"
                                        data-date="{{ $tour->date }}"
                                        data-time="{{ $tour->time }}"
                                        data-pickup="{{ e($tour->pickuplocations) }}"
                                        data-features="{{ e($tour->features) }}"
                                        data-description="{{ e($tour->description) }}"
                                        data-image="{{ $tour->image }}"
                                        data-staff="{{$tour->staff_id}}"
                                         data-package_type="{{$tour->package_type}}">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7">

                                <div class="tour-empty">

                                    <div class="tour-empty-icon">
                                        <i class="fas fa-route"></i>
                                    </div>

                                    <h4>No Tours Found</h4>

                                    <p>
                                        Start by adding your first tour.
                                    </p>

                                    <button type="button"
                                            class="tour-empty-btn"
                                            data-toggle="modal"
                                            data-target="#addTourModal">

                                        <i class="fas fa-plus"></i>
                                        Add Tour

                                    </button>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

           <div class="pagination-wrapper">
    {{ $tours->withQueryString()->links() }}
</div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
<div class="modal fade tour-modern-modal"
     id="editTourModal"
     tabindex="-1">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="tour-modal-header">

                <div class="tour-modal-icon edit">
                    <i class="fas fa-edit"></i>
                </div>

                <div>
                    <h4>Edit Tour</h4>
                    <p>Update tour information and schedule</p>
                </div>

                <button type="button"
                        class="tour-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <form method="POST"
                  enctype="multipart/form-data"
                  id="editTourForm">

                @csrf
                @method('PUT')


                <div class="tour-modal-body">

                    <!-- Tour Information -->
                    <div class="tour-form-section">

                        <div class="tour-form-title">

                            <div>
                                <i class="fas fa-info-circle"></i>
                            </div>

                            <span>
                                <strong>Tour Information</strong>
                                <small>Update basic tour details</small>
                            </span>

                        </div>


                        <div class="row">

                        
                            <div class="col-md-3">

                                <label>
                                    Travel Mode <b>*</b>
                                </label>

                                <div class="tour-form-input amount-field">
                                    <i class="fas fa-subway"></i>

                                     <select name="mode" class="form-control" id="edit_travel_mode" >
                                      
                                        <option value="1">Bus</option>

                                         <option value="2">Train</option>
                                      
                                    </select>

                                  

                                </div>

                            </div>

                            <div class="col-md-3">

                                <label>
                                    Tour Name <b>*</b>
                                </label>

                                <div class="tour-form-input">

                                    <i class="fas fa-suitcase"></i>

                                    <input type="text"
                                           name="tourname"
                                           id="edit_tourname"
                                           class="form-control"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-3">

                                <label>
                                    Tour Amount <b>*</b>
                                </label>

                                <div class="tour-form-input amount-field">

                                    <span>₹</span>

                                    <input type="text"
                                           name="amount"
                                           id="edit_amount"
                                           class="form-control"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-3">

                                <label>
                                    Total Seats <b>*</b>
                                </label>

                                <div class="tour-form-input">

                                    <i class="fas fa-users"></i>

                                    <input type="number"
                                           name="total_seats"
                                           id="edit_total_seats"
                                           class="form-control"
                                           min="1"
                                           required>

                                </div>

                            </div>

                             <div class="col-md-3">

                                <label>
                                   Assigned Staff <b>*</b>
                                </label>

                                <div class="tour-form-input">

                                    <i class="fas fa-users"></i>

                                    <select name="staff" class="form-control" id="edit_staff_name" >
                                        @foreach($staff as $key)
                                        <option value="{{$key->id}}">{{$key->staff_name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Schedule -->
                    <div class="tour-form-section">

                        <div class="tour-form-title">

                            <div>
                                <i class="fas fa-calendar-alt"></i>
                            </div>

                            <span>
                                <strong>Schedule & Capacity</strong>
                                <small>Update date, time and pickup location</small>
                            </span>

                        </div>


                        <div class="row">

                            <div class="col-md-4">

                                <label>
                                    Date <b>*</b>
                                </label>

                                <div class="tour-form-input">

                                    <i class="fas fa-calendar"></i>

                                    <input type="date"
                                           name="date"
                                           id="edit_date"
                                           class="form-control"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <label>
                                    Time <b>*</b>
                                </label>

                                <div class="tour-form-input">

                                    <i class="fas fa-clock"></i>

                                    <input type="time"
                                           name="time"
                                           id="edit_time"
                                           class="form-control"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-4">

                                <label>
                                    Pickup Locations <b>*</b>
                                </label>

                                <div class="tour-form-input">

                                    <i class="fas fa-map-marker-alt"></i>

                                    <input type="text"
                                           name="pickuplocations"
                                           id="edit_pickup"
                                           class="form-control"
                                           required>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Image -->
                    <div class="tour-form-section">

                        <div class="tour-form-title">

                            <div>
                                <i class="fas fa-image"></i>
                            </div>

                            <span>
                                <strong>Tour Image</strong>
                                <small>Current image and replacement</small>
                            </span>

                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <label>Current Image</label>

                                <div class="edit-image-preview">

                                    <img id="edit_tour_image"
                                         src=""
                                         alt="Tour Image">

                                    <div>

                                        <strong id="edit_image_name">
                                            Current Image
                                        </strong>

                                        <small>
                                            Existing tour image
                                        </small>

                                    </div>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label>Replace Image</label>

                                <div class="tour-file-input">

                                    <i class="fas fa-cloud-upload-alt"></i>

                                    <input type="file"
                                           name="image"
                                           accept=".jpg,.jpeg,.png,.webp">

                                </div>

                                <small>
                                    Leave empty to keep the current image.
                                </small>

                            </div>

                        </div>

                    </div>


                    <!-- Details -->
                    <div class="tour-form-section">

                        <div class="tour-form-title">

                            <div>
                                <i class="fas fa-file-alt"></i>
                            </div>

                            <span>
                                <strong>Tour Details</strong>
                                <small>Update features and description</small>
                            </span>

                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <label>
                                    Features <b>*</b>
                                </label>

                                <textarea name="features"
                                          id="edit_features"
                                          class="form-control tour-description"
                                          rows="5"
                                          required></textarea>

                            </div>


                            <div class="col-md-6">

                                <label>
                                    Description <b>*</b>
                                </label>

                                <textarea name="description"
                                          id="edit_description"
                                          class="form-control tour-description"
                                          rows="5"
                                          required></textarea>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Footer -->
                <div class="tour-modal-footer">

                    <button type="button"
                            class="tour-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>
                        Cancel

                    </button>


                    <button type="submit"
                            class="tour-submit-btn">

                        <i class="fas fa-save"></i>
                        Update Tour

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- ================================================= -->
<!-- ADD TOUR MODAL -->
<!-- ================================================= -->
<div class="modal fade tour-modern-modal"
     id="addTourModal"
     tabindex="-1">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content">

            <div class="tour-modal-header">

                <div class="tour-modal-icon">
                    <i class="fas fa-route"></i>
                </div>

                <div>
                    <h4>Add New Tour</h4>
                    <p>Create a new tour package and schedule</p>
                </div>

                <button type="button"
                        class="tour-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <form method="POST"
                  enctype="multipart/form-data"
                  action="{{ route('tours.store') }}">

                @csrf

                <div class="tour-modal-body">

                    <!-- Basic Information -->
                    <div class="tour-form-section">

                        <div class="tour-form-title">

                            <div>
                                <i class="fas fa-info-circle"></i>
                            </div>

                            <span>
                                <strong>Tour Information</strong>
                                <small>Basic tour details</small>
                            </span>

                        </div>


                        <div class="row">

                          <div class="col-md-3">

                                <label>
                                    Travel Mode <b>*</b>
                                </label>

                                <div class="tour-form-input amount-field">

                                <i class="fas fa-subway"></i>

                                     <select name="mode" class="form-control"  >
                                      
                                        <option value="1">Bus</option>

                                         <option value="2">Train</option>
                                      
                                    </select>

                                  

                                </div>

                            </div>

                            <div class="col-md-3">

                                <label>Tour Name <b>*</b></label>

                                <div class="tour-form-input">
                                    <i class="fas fa-suitcase"></i>

                                    <input type="text"
                                           name="tourname"
                                           class="form-control"
                                           placeholder="Enter tour name"
                                           required>
                                </div>

                            </div>


                            <div class="col-md-3">

                                <label>Tour Image <b>*</b></label>

                                <div class="tour-file-input">

                                    <i class="fas fa-image"></i>

                                    <input type="file"
                                           name="image"
                                           accept=".jpg,.jpeg,.png,.webp"
                                           required>

                                </div>

                                <small>JPG, PNG or WEBP · Max 10MB</small>

                            </div>


                            <div class="col-md-3">

                                <label>Tour Amount <b>*</b></label>

                                <div class="tour-form-input amount-field">

                                    <span>₹</span>

                                    <input type="text"
                                           name="amount"
                                           class="form-control"
                                           placeholder="Enter amount"
                                           required>

                                </div>

                            </div>

                                <div class="col-md-3">

                                <label>
                                   Assigned Staff <b>*</b>
                                </label>

                                <div class="tour-form-input">

                                    <i class="fas fa-users"></i>

                                    <select name="staff" class="form-control" >
                                        @foreach($staff as $key)
                                        <option value="{{$key->id}}">{{$key->staff_name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Schedule -->
                    <div class="tour-form-section">

                        <div class="tour-form-title">

                            <div>
                                <i class="fas fa-calendar-alt"></i>
                            </div>

                            <span>
                                <strong>Schedule & Capacity</strong>
                                <small>Tour timing and seat information</small>
                            </span>

                        </div>


                        <div class="row">

                            <div class="col-md-3">

                                <label>Date <b>*</b></label>

                                <div class="tour-form-input">

                                    <i class="fas fa-calendar"></i>

                                    <input type="date"
                                           name="date"
                                           class="form-control"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-3">

                                <label>Time <b>*</b></label>

                                <div class="tour-form-input">

                                    <i class="fas fa-clock"></i>

                                    <input type="time"
                                           name="time"
                                           class="form-control"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-3">

                                <label>Total Seats <b>*</b></label>

                                <div class="tour-form-input">

                                    <i class="fas fa-users"></i>

                                    <input type="number"
                                           name="total_seats"
                                           class="form-control"
                                           placeholder="Total seats"
                                           min="1"
                                           required>

                                </div>

                            </div>


                            <div class="col-md-3">

                                <label>Pickup Locations <b>*</b></label>

                                <div class="tour-form-input">

                                    <i class="fas fa-map-marker-alt"></i>

                                    <input type="text"
                                           name="pickuplocations"
                                           class="form-control"
                                           placeholder="Pickup locations"
                                           required>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Details -->
                    <div class="tour-form-section">

                        <div class="tour-form-title">

                            <div>
                                <i class="fas fa-file-alt"></i>
                            </div>

                            <span>
                                <strong>Tour Details</strong>
                                <small>Features and description</small>
                            </span>

                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <label>Features <b>*</b></label>

                                <textarea name="features"
                                          class="form-control tour-description"
                                          rows="5"
                                          placeholder="Enter tour features..."
                                          required></textarea>

                            </div>


                            <div class="col-md-6">

                                <label>Description <b>*</b></label>

                                <textarea name="description"
                                          class="form-control tour-description"
                                          rows="5"
                                          placeholder="Enter detailed tour description..."
                                          required></textarea>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="tour-modal-footer">

                    <button type="button"
                            class="tour-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>
                        Cancel

                    </button>


                    <button type="submit"
                            class="tour-submit-btn">

                        <i class="fas fa-check"></i>
                        Save Tour

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<script>
$(document).ready(function () {

    $('#editTourModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);

        // Get data from clicked button
        var id          = button.attr('data-id');
        var tourname    = button.attr('data-tourname');
        var amount      = button.attr('data-amount');
        var totalSeats  = button.attr('data-total-seats');
        var date        = button.attr('data-date');
        var time        = button.attr('data-time');
        var pickup      = button.attr('data-pickup');
        var features    = button.attr('data-features');
        var description = button.attr('data-description');
        var image       = button.attr('data-image');
        var staff       = button.attr('data-staff');
         var package_type       = button.attr('data-package_type');


        // Fill modal inputs
        $('#edit_tourname').val(tourname);

        $('#edit_amount').val(amount);

        $('#edit_total_seats').val(totalSeats);

        $('#edit_date').val(date);

        $('#edit_time').val(time);

        $('#edit_pickup').val(pickup);

        $('#edit_features').val(features);

        $('#edit_description').val(description);

        $('#edit_staff_name').val(staff);

         $('#edit_travel_mode').val(package_type);


        // Current image
        if (image) {

            $('#edit_tour_image')
                .attr('src', "{{ asset('public/uploads/tours') }}/" + image);

            $('#edit_image_name').text(image);

        } else {

            $('#edit_tour_image').attr('src', '');

            $('#edit_image_name').text('No image available');

        }


        // Dynamic update route
        var action = "{{ route('tours.update', ':id') }}";

        action = action.replace(':id', id);

        $('#editTourForm').attr('action', action);

    });


    // Clear modal when closed
    $('#editTourModal').on('hidden.bs.modal', function () {

        $('#editTourForm')[0].reset();

        $('#edit_tour_image').attr('src', '');

    });


    // Alert close
    $('.tour-alert-close').on('click', function () {

        $(this).closest('.tour-alert').fadeOut(200);

    });

});
</script>

@endsection