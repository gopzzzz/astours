@extends('layouts.mainlayout')

@section('content')

<style>

/* =========================================
   REVENUE TABLE
========================================= */

.revenue-table-wrapper {
    width: 100%;
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(25, 35, 55, .04);
}

.revenue-table {
    width: 100%;
    margin: 0;
    border: 0 !important;
}

.revenue-table thead {
    background: #f7f8fb;
}

.revenue-table thead th {
    padding: 14px 16px;
    border: 0 !important;
    border-bottom: 1px solid #e8ebf0 !important;

    color: #697281;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .35px;
    white-space: nowrap;
}

.revenue-table tbody td {
    padding: 13px 16px;
    border: 0 !important;
    border-bottom: 1px solid #f0f2f5 !important;

    vertical-align: middle;
    color: #394150;
    font-size: 12px;
}

.revenue-table tbody tr:last-child td {
    border-bottom: 0 !important;
}

.revenue-table tbody tr {
    transition: background .2s ease;
}

.revenue-table tbody tr:hover {
    background: #fafbff;
}


/* =========================================
   ID
========================================= */

.revenue-id {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 29px;
    height: 27px;
    padding: 0 7px;

    border-radius: 7px;

    background: #f1f4f8;
    color: #667080;

    font-size: 10px;
    font-weight: 600;
}


/* =========================================
   BOOKING PERSON
========================================= */

.revenue-person-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.revenue-avatar {
    width: 35px;
    height: 35px;
    min-width: 35px;

    border-radius: 9px;

    background: #eef4ff;
    color: #3867e8;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 12px;
}

.revenue-person-cell strong {
    display: block;

    color: #2d3542;
    font-size: 12px;
    font-weight: 600;
}

.revenue-person-cell small {
    display: block;

    margin-top: 2px;

    color: #9ba3b0;
    font-size: 9px;
}


/* =========================================
   TOUR ID
========================================= */

.revenue-tour-id {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 38px;
    height: 28px;
    padding: 0 9px;

    border-radius: 7px;

    background: #f5f7fa;
    color: #586274;

    font-size: 10px;
    font-weight: 600;
}


/* =========================================
   PAYMENT STATUS
========================================= */

.revenue-payment-status {
    display: inline-flex;
    align-items: center;

    padding: 6px 10px;

    border-radius: 7px;

    background: #f1f5ff;
    color: #3867e8;

    font-size: 10px;
    font-weight: 600;
}


/* =========================================
   PAYMENT MODE
========================================= */

.revenue-payment-mode {
    display: inline-flex;
    align-items: center;

    padding: 6px 10px;

    border-radius: 7px;

    background: #f5f7fa;
    color: #697281;

    font-size: 10px;
    font-weight: 600;
}


/* =========================================
   RECEIVED AMOUNT
========================================= */

.revenue-received {
    color: #16804b;
    font-size: 12px;
    font-weight: 700;
}


/* =========================================
   PENDING AMOUNT
========================================= */

.revenue-pending {
    color: #d97706;
    font-size: 12px;
    font-weight: 700;
}


/* =========================================
   BOOKING STATUS
========================================= */

.revenue-status-confirmed {
    display: inline-flex;
    align-items: center;

    padding: 6px 10px;

    border-radius: 7px;

    background: #eaf8f0;
    color: #16804b;

    font-size: 10px;
    font-weight: 600;
}

.revenue-status-pending {
    display: inline-flex;
    align-items: center;

    padding: 6px 10px;

    border-radius: 7px;

    background: #fff7e8;
    color: #d97706;

    font-size: 10px;
    font-weight: 600;
}


/* =========================================
   EMPTY STATE
========================================= */

.revenue-empty {
    padding: 45px 20px;
    text-align: center;
}

.revenue-empty-icon {
    width: 52px;
    height: 52px;

    margin: 0 auto 12px;

    border-radius: 13px;

    background: #f1f4f8;
    color: #9aa3b0;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 19px;
}

.revenue-empty h5 {
    margin: 0;

    color: #3c4452;
    font-size: 14px;
    font-weight: 600;
}

.revenue-empty p {
    margin: 5px 0 0;

    color: #9ba3b0;
    font-size: 11px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .revenue-table-wrapper {
        overflow-x: auto;
    }

    .revenue-table {
        min-width: 950px;
    }

    .revenue-table thead th,
    .revenue-table tbody td {
        padding: 11px 12px;
    }
}

</style>


<div class="content-wrapper">


    <!-- =========================================
         CONTENT HEADER
    ========================================== -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>
                        Revenue Reports
                    </h1>

                </div>


                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">

                            <a href="#">
                                Home
                            </a>

                        </li>

                        <li class="breadcrumb-item active">

                            Revenue Reports

                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>



    <!-- =========================================
         MAIN CONTENT
    ========================================== -->

    <section class="content">

        <div class="container-fluid">


            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif



            <!-- ERROR MESSAGE -->

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif



            <!-- CARD -->

            <div class="card">


                <!-- CARD HEADER -->

                <div class="card-header">

                    <h3 class="card-title">

                        Revenue Reports

                    </h3>

                </div>



                <!-- CARD BODY -->

                <div class="card-body">

                    <div class="table-responsive">

                        <div class="revenue-table-wrapper">


                            <table class="table revenue-table">


                                <!-- TABLE HEADER -->

                                <thead>

                                    <tr>

                                        <th width="70">
                                            #
                                        </th>

                                         <th>
                                           Date
                                        </th>


                                        <th>
                                            Booking Person Name
                                        </th>

                                        <th>
                                            Booking Id
                                        </th>


                                        <th>
                                          Total Amount
                                        </th>

                                        <th>
                                            Received Amount
                                        </th>

                                        
                                        <th>
                                            Discount
                                        </th>

                                        <th>
                                            Pending Amount
                                        </th>

                                        <!-- <th>
                                            Booking Status
                                        </th> -->

                                    </tr>

                                </thead>



                                <!-- TABLE BODY -->

                                <tbody>


                                    @forelse($revenueReports as $report)


                                        <tr>


                                            <!-- ID -->

                                            <td>

                                                <span class="revenue-id">

                                                    {{ $report->id }}

                                                </span>

                                            </td>

<td>
    <span >
        {{ \Carbon\Carbon::parse($report->bookingdate)->format('d-m-Y') }}
    </span>
</td>




                                            <!-- BOOKING PERSON NAME -->

                                            <td>

                                                <div class="revenue-person-cell">


                                                    <div class="revenue-avatar">

                                                        <i class="fas fa-user"></i>

                                                    </div>


                                                    <div>

                                                        <strong>

                                                            {{ $report->booking_personname }}

                                                        </strong>

                                                        <small>

                                                            Booking Person

                                                        </small>

                                                    </div>


                                                </div>

                                            </td>



                                            <!-- TOUR ID -->

                                            

                                            <td>

                                                <span class="revenue-tour-id">

                                                    {{ $report->id }}

                                                </span>

                                            </td>



                                         


                                            <!-- RECEIVED AMOUNT -->

                                             <td>

                                                <span class="revenue-received">

                                                    ₹ {{ number_format($report->totalamount, 2) }}

                                                </span>

                                            </td>

                                            

                                            <td>

                                                <span class="revenue-received">

                                                    ₹ {{ number_format($report->received_amount, 2) }}

                                                </span>

                                            </td>

                                            
                                             <td>

                                                <span class="revenue-received">

                                                    ₹ {{ number_format($report->discount, 2) }}

                                                </span>

                                            </td>



                                            <!-- PENDING AMOUNT -->

                                            <td>

                                                <span class="revenue-pending">

                                                    ₹ {{ number_format($report->pending_amount, 2) }}

                                                </span>

                                            </td>



                                            <!-- BOOKING STATUS -->

                                          


                                        </tr>


                                    @empty


                                        <!-- EMPTY -->

                                        <tr>

                                            <td colspan="8">


                                                <div class="revenue-empty">


                                                    <div class="revenue-empty-icon">

                                                        <i class="fas fa-chart-line"></i>

                                                    </div>


                                                    <h5>

                                                        No Revenue Reports Found

                                                    </h5>


                                                    <p>

                                                        There are currently no booking revenue records available.

                                                    </p>


                                                </div>


                                            </td>

                                        </tr>


                                    @endforelse


                                </tbody>


                            </table>


                        </div>

                    </div>

                </div>


            </div>


        </div>

    </section>


</div>

<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
@endsection