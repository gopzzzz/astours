@extends('layouts.mainlayout')

@section('content')

<style>

/* =========================================
   CUSTOMERS PAGE
========================================= */

.customer-page {
    padding: 10px 0 30px;
}

.customer-page-header {
    margin-bottom: 20px;
}

.customer-page-header h1 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    color: #202632;
}

.customer-page-header p {
    margin-top: 5px;
    color: #8b94a3;
    font-size: 14px;
}


/* =========================================
   CUSTOMER TABLE WRAPPER
========================================= */

.customer-table-wrapper {
    background: #ffffff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
    overflow-x: auto;
}


/* =========================================
   TABLE
========================================= */

.customer-table {
    width: 100%;
    min-width: 750px;
    border-collapse: collapse;
}

.customer-table thead th {
    padding: 15px 18px;
    background: #f8f9fb;
    border-bottom: 1px solid #e7ebf1;

    color: #687281;
    font-size: 11px;
    font-weight: 700;

    text-transform: uppercase;
    letter-spacing: .4px;

    white-space: nowrap;
}

.customer-table tbody td {
    padding: 16px 18px;

    border-bottom: 1px solid #eef1f5;

    color: #424b59;
    font-size: 13px;

    vertical-align: middle;
}

.customer-table tbody tr:last-child td {
    border-bottom: 0;
}

.customer-table tbody tr:hover {
    background: #fafcff;
}


/* =========================================
   CUSTOMER ID
========================================= */

.customer-id {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    min-width: 34px;
    height: 30px;

    padding: 0 9px;

    border-radius: 7px;

    background: #eef4ff;
    color: #2867df;

    font-size: 11px;
    font-weight: 700;
}


/* =========================================
   CUSTOMER NAME
========================================= */

.customer-name {
    font-weight: 600;
    color: #303845;
}


/* =========================================
   PHONE
========================================= */

.customer-phone {
    color: #566171;
    font-weight: 500;
}


/* =========================================
   EMAIL
========================================= */

.customer-email {
    color: #566171;
}


/* =========================================
   USER ID
========================================= */

.customer-userid {
    display: inline-flex;

    padding: 6px 10px;

    border-radius: 7px;

    background: #f1f4f8;

    color: #667080;

    font-size: 11px;
    font-weight: 600;
}


/* =========================================
   EMPTY
========================================= */

.customer-empty {
    padding: 50px 20px;

    text-align: center;

    color: #929baa;

    font-size: 14px;
}

.customer-empty i {
    display: block;

    margin-bottom: 10px;

    font-size: 28px;
}


/* =========================================
   RESPONSIVE
========================================= */

@media (max-width: 768px) {

    .customer-page-header h1 {
        font-size: 24px;
    }

    .customer-table {
        min-width: 750px;
    }

}

</style>


<div class="content-wrapper">

    <section class="content">

        <div class="container-fluid customer-page">


            <!-- =====================================
                 PAGE HEADER
            ====================================== -->

            <div class="customer-page-header">

                <h1>
                    Customers
                </h1>

                <p>
                    View all registered customers
                </p>

            </div>


            <!-- =====================================
                 CUSTOMER TABLE
            ====================================== -->

            <div class="customer-table-wrapper">

                <table class="customer-table">


                    <!-- TABLE HEADER -->

                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Phone Number
                            </th>

                            <th>
                                Email
                            </th>

                             <th>
                                Booked Tours
                            </th>

                            <th>
                                 Bookings History
                            </th>
<!-- 
                            <th>
                                User ID
                            </th> -->

                        </tr>

                    </thead>


                    <!-- TABLE BODY -->

                    <tbody>


                        @forelse($customers as $customer)


                            <tr>


                                <!-- ID -->

                                <td>

                                    <span class="customer-id">

                                        #{{ $customer->id }}

                                    </span>

                                </td>


                                <!-- NAME -->

                                <td>

                                    <span class="customer-name">

                                        {{ $customer->name }}

                                    </span>

                                </td>


                                <!-- PHONE NUMBER -->

                                <td>

                                    <span class="customer-phone">

                                        {{ $customer->phonenumber }}

                                    </span>

                                </td>


                                <!-- EMAIL -->

                                <td>

                                    <span class="customer-email">

                                        {{ $customer->mail }}

                                    </span>

                                </td>

                                <td>

                                                                <span class="customer-email">
                                    @php
                                        $id = $customer->phonenumber;

                                        $tours = DB::table('bookingmasters')
                                            ->join('tours', 'tours.id', '=', 'bookingmasters.tour_id')
                                            ->where('bookingmasters.phonenumber', $id)
                                            ->distinct()
                                            ->pluck('tours.tourname')
                                            ->implode(', ');
                                    @endphp

                                    {{ $tours }}
                                </span>
                                </td>



                                <!-- USER ID -->

                                <td>

                                <a href="{{ route('previousbookings', ['phone' => $customer->phonenumber]) }}"
   class="btn btn-sm btn-success">
    <i class="fas fa-history me-1"></i>
    Previous Bookings
</a>

                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td colspan="5">

                                    <div class="customer-empty">

                                        <i class="fas fa-users"></i>

                                        No customers found.

                                    </div>

                                </td>

                            </tr>


                        @endforelse


                    </tbody>


                </table>

                  <div class="pagination-wrapper">
    {{ $customers->withQueryString()->links() }}
</div>


            </div>


        </div>

    </section>

</div>

<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>

@endsection